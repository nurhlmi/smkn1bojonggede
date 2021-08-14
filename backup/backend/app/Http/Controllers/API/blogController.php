<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\BlogResource;
use App\Blog;

class blogController extends Controller
{
    public $api_key = "jUvqalsa4G7b7NJL2trb";

    public function getBlog(Request $request)
    {
        if($request->header('api_key') === $this->api_key || $request->input('api_key') === $this->api_key){
            
            if($request->code === null && $request->limit === null ) {
                $blog = Blog::where('status', 'on')->orderby('id', 'DESC');
            }
            
            if($request->code !== null) {
                $blog = Blog::where([
                    ['status', 'on'],
                    ['blog_slug', $request->code]
                ])->orderby('id', 'DESC');
            }
            
            if($request->limit !== null){
                $blog = Blog::where('status', 'on')->orderby('id', 'DESC')->limit($request->limit);
            }
            
            $data = BlogResource::collection($blog->get());
            $total = $blog->count();

            if($total >= 1){
                return response()->json(['success' => 'true' , 'result' => $total , 'data' => $data], 200);
            } else {
                return response()->json(['success' => 'false', 'error' => 'code not found'], 404);    
            }
        } else {
            return response()->json(['success' => 'false', 'error' => 'access is denied'], 401);
        }
    }

    public function getBlogRandom(Request $request)
    {
        if($request->header('api_key') === $this->api_key || $request->input('api_key') === $this->api_key) {
            if($request->except === null) {
                $blog = Blog::where('status', 'on')->inRandomOrder()->limit(4);    
            } else {
                $blog = Blog::where([
                    ['status', 'on'],
                    ['blog_slug', '!=', $request->except],
                ])->inRandomOrder()->limit(4);    
            }
            $data = BlogResource::collection($blog->select('blog_slug','title', 'image', 'created_at')->get());
            $total = $blog->count();
            return response()->json(['success' => 'true' , 'result' => $total , 'data' => $data], 200);
        } else {
            return response()->json(['success' => 'false', 'error' => 'access is denied'], 401);
        }
    }
}
