<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PageRequest;
use Session;
use Storage;
use App\Params;
use App\Page;

class pageController extends Controller
{
    
    public function index()
    {
        $page_data = Page::orderby('category_page', 'ASC')->paginate(12);
        return view('page/index', compact('page_data'));
    }

    public function create()
    {
        $page_category_list = Params::orderby('params', 'ASC')->where([
            ['category_params', 'page'],
            ['status', 'true'],
        ])->pluck('params', 'id');

        return view('page/create', compact('page_category_list'));
    }

    public function store(PageRequest $request)
    {

        $jumlah_page = Page::where('category_page', $request->category_page)->count();

        if($jumlah_page < 1) {
            $input = $request->all();
    
            if($request->hasfile('image')) {
                $input['image'] = $this->upload_image($request);
            }
    
            Page::create($input);
            Session::flash('flash_message', 'Data Berhasil di Buat');
            return redirect('page');
        } else {
            Session::flash('flash_message', 'Data Sudah Ada');
            Session::flash('penting');
            return redirect('page/create');
        }
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $page_data = Page::findOrFail($id);
        return view('page/edit', compact('page_data'));
    }

    public function update(PageRequest $request, $id)
    {
        $page = Page::findOrFail($id);
        $input = $request->all();

        if($request->hasfile('image')) {
            //Hapus Foto Lama
            $this->deleteImage($page);

            //upload Foto Baru
            $input['image'] = $this->upload_image($request);
        }

        $page->update($input);
        Session::flash('flash_message', 'Berhasil Simpan Data');
        return redirect('page');
    }


    public function destroy(Request $request, $id)
    {
        $page = Page::findOrFail($request->id);

        //Delete Image
        $this->deleteImage($page);

        $page->delete();
        Session::flash('flash_message', "Data Berhasil Di Hapus");
        return back();
    }

    public function upload_image(PageRequest $request) {
        $image = $request->file('image');
        $ext = $image->getClientOriginalExtension();

        if($request->file('image')->isValid()) {
            $image_name = date('YmdHis').".$ext";
            $upload_path = 'images/page';
            $request->file('image')->move($upload_path, $image_name);
            return $image_name;
        }
        return false;
    }

    private function deleteImage($page)
    {
        $exist = Storage::disk('local_public')->exists('images/page/'.$page->image);
        if(isset($page->image)) {
            Storage::disk('local_public')->delete('images/page/'.$page->image);
        }
    }
}
