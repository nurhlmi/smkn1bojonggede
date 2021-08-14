<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\CarouselResource;
use App\Carousel;

class carouselController extends Controller
{
    public $api_key = "jUvqalsa4G7b7NJL2trb";

    public function getCarausel(Request $request)
    {
        if($request->header('api_key') === $this->api_key || $request->input('api_key') === $this->api_key ){
            $carousel = Carousel::orderby('order', 'ASC');
            $data = CarouselResource::collection($carousel->get());
            $total = $carousel->count();

            return response()->json(['success' => 'true' , 'result' => $total , 'data' => $data], 200);
        } else {
            return response()->json(['success' => 'false', 'error' => 'access is denied'], 401);
        }
    }
}
