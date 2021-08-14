<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TeacherRequest;
use Session;
use Storage;
use App\Teacher;

class teacherController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $teacher_data = Teacher::paginate(12);
        return view('teacher/index', compact('teacher_data'));
    }

    public function create()
    {
        return view('teacher/create');
    }

    public function store(TeacherRequest $request)
    {
        $input = $request->all();
        if($request->hasfile('image')){
            $input['image'] = $this->upload_image($request);
        }

        Teacher::create($input);
        Session::flash('flash_message', 'Berhasil Tambah Data');
        return redirect('teacher');
    }
    
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
        $teacher_data = Teacher::findOrfail($id);
        return view('teacher/edit', compact('teacher_data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Teacher $teacher, TeacherRequest $request)
    {
        $input = $request->all();
        if($request->hasfile('image')) {
            //Hapus Foto Lama
            $exist = Storage::disk('local_public')->exists('images/teacher/'.$teacher->image);
            if(isset($teacher->image)) {
                Storage::disk('local_public')->delete('images/teacher/'.$teacher->image);
            }

            //Upload Foto Baru
            $input['image'] = $this->upload_image($request);
        }
        $teacher->update($input);
        Session::flash('flash_message', 'Data Behasil di Simpan');
        return redirect('teacher');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $teacher = Teacher::findOrFail($request->id);
        if(!empty($teacher->image)){
            //Hapus Foto Lama
            $exist = Storage::disk('local_public')->exists('images/teacher/'.$teacher->image);
            if(isset($teacher->image)) {
                Storage::disk('local_public')->delete('images/teacher/'.$teacher->image);
            }
        }

        $teacher->delete();
        Session::flash('flash_message', 'Data Berhasil Di Hapus');
        return back();
    }

    public function upload_image(TeacherRequest $request) {
        $image = $request->file('image');
        $ext = $image->getClientOriginalExtension();

        if($request->file('image')->isValid()) {
            $image_name = date('YmdHis').".$ext";
            $upload_path = 'images/teacher';
            $request->file('image')->move($upload_path, $image_name);
            return $image_name;
        }
        return false;
    }
}
