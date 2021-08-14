<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\GalleryRequest;
use App\Gallery;
use Session;
use Storage;
class galleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gallery_data = Gallery::paginate(12);
        return view('gallery/index', compact('gallery_data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('gallery/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GalleryRequest $request)
    {
        $input = $request->all();

        if($request->input('category') == 'image') {
            if($request->hasfile('file')) {
                $input['file'] = $this->upload_image($request);
            }
        } else {
            $input['file'] = $request->input('file');
        }

        Gallery::create($input);
        Session::flash('flash_message', 'Data Berhasil di Simpan');
        return redirect('gallery');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $gallery_data = Gallery::findOrFail($id);
        return view('gallery/edit', compact('gallery_data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(GalleryRequest $request, $id)
    {
        $gallery = Gallery::findOrFail($id);
        $input = $request->all();
        if($request->input('category') == 'image') {
            if($request->hasfile('file')) {
                //Hapus Foto Lama
                $this->imageDestroy($gallery);

                //Upload Foto Baru
                $input['file'] = $this->upload_image($request);
            }
        }
        
        if($request->input('category') == 'video') {
            $input['file'] = $request->input('file');
        }

        $gallery->update($input);
        Session::flash('flash_message', 'Data Berhasil di Simpan');
        return redirect('gallery');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $gallery = Gallery::findOrFail($request->id);
        if(!empty($gallery->file) && $gallery->category == 'image'){
            $this->imageDestroy($gallery);
        }
        $gallery->delete();
        Session::flash('flash_message', 'Data Berhasil di Hapus');
        return back();
    }

    public function upload_image(GalleryRequest $request) {
        $image = $request->file('file');
        $ext = $image->getClientOriginalExtension();

        if($request->file('file')->isValid()) {
            $image_name = date('YmdHis').".$ext";
            $upload_path = 'images/gallery';
            $request->file('file')->move($upload_path, $image_name);
            return $image_name;
        }
        return false;
    }

    public function imageDestroy(Gallery $gallery)
    {
        $exist = Storage::disk('local_public')->exists('images/gallery/'.$gallery->file);
        if(isset($gallery->file)) {
            Storage::disk('local_public')->delete('images/gallery/'.$gallery->file);
        }
    }
}
