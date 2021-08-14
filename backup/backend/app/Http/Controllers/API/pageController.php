<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\PageResource;
use App\Page;

class pageController extends Controller
{
 
    public $api_key = "jUvqalsa4G7b7NJL2trb";

    public function getPageSejarah(Request $request)
    {
        if($request->header('api_key') === $this->api_key || $request->input('api_key') === $this->api_key){
            $sejarah = Page::where('category_page', '1')->limit(1);
            if($sejarah->count() != 0){
                $data = PageResource::collection($sejarah->get());
            } else {
                $data = "data not found";
            }
            return response()->json(['success' => 'true' , 'data' => $data], 200);
        } else {
            return response()->json(['success' => 'false', 'error' => 'access is denied'], 401);
        }
    }

    public function getPageVisiMisi(Request $request)
    {
        if($request->header('api_key') === $this->api_key || $request->input('api_key') === $this->api_key){
            $visi_misi = Page::where('category_page', '2')->limit(1);
            if($visi_misi->count() != 0) {
                $data = PageResource::collection($visi_misi->get());
            } else {
                $data = "data not found";
            }

            return response()->json(['success' => 'true' , 'data' => $data], 200);
        } else {
            return response()->json(['success' => 'false', 'error' => 'access is denied'], 401);
        }
    }
    
    public function getPageKurikulum(Request $request)
    {
        if($request->header('api_key') === $this->api_key || $request->input('api_key') === $this->api_key){
            $kurikulum = Page::where('category_page', '3')->limit(1);
            if($kurikulum->count() != 0) {
                $data = PageResource::collection($kurikulum->get());
            } else {
                $data = "data not found";
            }

            return response()->json(['success' => 'true' , 'data' => $data], 200);
        } else {
            return response()->json(['success' => 'false', 'error' => 'access is denied'], 401);
        }
    }
}
