<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\GalleryResource;
use App\Gallery;

class galleryController extends Controller
{
    public $api_key = "jUvqalsa4G7b7NJL2trb";

    public function getGallery(Request $request)
    {
        if($request->header('api_key') === $this->api_key || $request->input('api_key') === $this->api_key ){
            if($request->category === null) {
                $gallery = Gallery::orderby('id', 'DESC');   
            } else {
                $gallery = Gallery::where('category', $request->category)->orderby('id', 'DESC');   
            }
            $data = GalleryResource::collection($gallery->get());
            $total = $gallery->count();
            
            if($total >= 1) {
                return response()->json(['success' => 'true' , 'result' => $total , 'data' => $data], 200);
            } else {
                return response()->json(['success' => 'false', 'error' => 'data not found'], 404);    
            }
        } else {
            return response()->json(['success' => 'false', 'error' => 'access is denied'], 401);
        }
    }
}
