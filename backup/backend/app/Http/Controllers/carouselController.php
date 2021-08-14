<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CarouselRequest;
use Storage;
use Session;
use App\Carousel;

class carouselController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $carousel_data = Carousel::orderBy('order', 'ASC')->get();
        return view('carousel/index', compact('carousel_data'));
    }

    public function create()
    {
        return view('carousel/create');
    }

    public function store(CarouselRequest $request)
    {
        
        $input = $request->all();
        if($request->hasfile('image')) {
            $input['image'] = $this->upload_image($request);
        }

        Carousel::create($input);
        Session::flash('flash_message', 'Data Berhasil di Tambahkan');
        return redirect('carousel');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $carousel_data = Carousel::findOrfail($id);
        return view('carousel.edit', compact('carousel_data'));
    }

    public function update(CarouselRequest $request, $id) {
        $carousel = Carousel::findOrFail($id);
        $input = $request->all();
        if($request->hasfile('image')) {
            //Hapus Foto Lama
            $exist = Storage::disk('local_public')->exists('images/carousel/'.$carousel->image);
            if(isset($carousel->image)) {
                Storage::disk('local_public')->delete('images/carousel/'.$carousel->image);
            }

            //Upload Foto Baru
            $input['image'] = $this->upload_image($request);
        }
        $carousel->update($input);
        Session::flash('flash_message', 'Data Behasil di Simpan');
        return redirect('carousel');
    }

    public function destroy(Request $request, $id)
    {
        $carousel = Carousel::findOrfail($request->carousel_id);

        if(!empty($carousel->image)){
            //Hapus Foto Lama
            $exist = Storage::disk('local_public')->exists('images/carousel/'.$carousel->image);
            if(isset($carousel->image)) {
                Storage::disk('local_public')->delete('images/carousel/'.$carousel->image);
            }
        }
        
        $carousel->delete();
        Session::flash('flash_message', 'Data Berhasil Di Hapus');
        return back();
    }

    public function upload_image(CarouselRequest $request) {
        $image = $request->file('image');
        $ext = $image->getClientOriginalExtension();

        if($request->file('image')->isValid()) {
            $image_name = date('YmdHis').".$ext";
            $upload_path = 'images/carousel';
            $request->file('image')->move($upload_path, $image_name);
            return $image_name;
        }
        return false;
    }
}
