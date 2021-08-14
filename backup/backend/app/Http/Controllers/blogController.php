<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\BlogRequest;
use Session;
use Illuminate\Support\Facades\Storage;
use App\Blog;

class blogController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $blog_data = Blog::orderby('id', 'desc')->paginate(12);
        return view('blog/index', compact('blog_data'));
    }
    
    public function create()
    {
        return view('blog/create');
    }

    public function store(BlogRequest $request)
    {
        $input = $request->all();

        if($request->hasfile('image')) {
            $input['image'] = $this->upload_image($request);
        }
        
        $string = preg_replace('/[^a-zA-Z0-9 &%|{.}=,?!*()"-_+$@;<>\']/', '', $request->input('title'));
        $trim = trim($string);
        $store_slug = strtolower(str_replace(array(" ", "/"), "-", $trim));
        $input['blog_slug'] = $store_slug;

        $result = Blog::create($input);
        Session::flash('flash_message', 'Data Berhasil di Tambahkan');
        return redirect('blog');
    }

    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $blog_id = $id;
        $blog_data = Blog::findOrFail($id);
        return view('blog/edit', compact('blog_id', 'blog_data'));
    }

    public function update(Blog $blog, BlogRequest $request)
    {
        $input = $request->all();
        if($request->hasfile('image')) {
            //Hapus Foto Lama
            $exist = Storage::disk('local_public')->exists('images/blog/'.$blog->image);
            if(isset($blog->image)) {
                Storage::disk('local_public')->delete('images/blog/'.$blog->image);
            }

            //Upload Foto Baru
            $input['image'] = $this->upload_image($request);
        }

        if(empty($request->status)){
            $input['status'] = null;
        }
        
        $string = preg_replace('/[^a-zA-Z0-9 &%|{.}=,?!*()"-_+$@;<>\']/', '', $request->input('title'));
        $trim = trim($string);
        $store_slug = strtolower(str_replace(array(" ", "/"), "-", $trim));
        $input['blog_slug'] = $store_slug;

        $blog->update($input);
        Session::flash('flash_message', 'Data Berhasil Di Tambah !!!');
        return redirect('blog');
    }


    public function destroy(Request $request, $id)
    {
        $blog = Blog::findOrFail($request->id);

        //Hapus Foto Lama
        $exist = Storage::disk('local_public')->exists('images/blog/'.$blog->image);
        if(isset($blog->image)) {
            Storage::disk('local_public')->delete('images/blog/'.$blog->image);
        }

        $blog->delete();
        Session::flash('flash_message', 'Data Berhasil Di Hapus');
        return back();
    }

    public function upload_image(BlogRequest $request) {
        $image = $request->file('image');
        $ext = $image->getClientOriginalExtension();

        if($request->file('image')->isValid()) {
            $image_name = date('YmdHis').".$ext";
            $upload_path = 'images/blog';
            $request->file('image')->move($upload_path, $image_name);
            return $image_name;
        }
        return false;
    }

    // public function showAllBlog(){
    //     $blog_data = Blog::select('id','title', 'description', 'absolute_link', 'image', 'created_at')->where('status', 'true')->get();
    //     $result = array(
    //         'data' => $blog_data
    //     );

    //     return $result;
    // }
}
