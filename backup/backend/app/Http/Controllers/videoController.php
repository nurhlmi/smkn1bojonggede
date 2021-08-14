<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\VideoRequest;
use Session;
use App\Video;

class videoController extends Controller
{
    
    public function index()
    {
        $video_data = Video::orderby('id', 'DESC')->paginate(12);
        return view('video/index', compact('video_data'));
    }

    
    public function create()
    {
        
        return view('video/create');
    }

    
    public function store(VideoRequest $request)
    {
        $input =  $request->all();
        Video::create($input);
        Session::flash('flash_message', 'Data Berhasil di Tambahkan');
        return redirect('video');
    }

    
    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        $video_data = Video::findOrFail($id);
        return view('video/edit', compact('video_data'));
    }

    public function update(VideoRequest $request, $id)
    {
        $video = Video::findOrFail($id);
        $input = $request->all();
        $video->update($input);
        Session::flash('flash_message', 'Berhasil Tambah Data');
        return redirect('video');
    }

    public function destroy(Request $request, $id)
    {
        $video = Video::findOrFail($request->id);
        $video->delete();
        Session::flash('flash_message', 'Behasil Hapus Data');
        return back();
    }
}
