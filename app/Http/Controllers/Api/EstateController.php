<?php

namespace App\Http\Controllers\Api;

use App\Estate;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Exception;
class EstateController extends Controller
{
   public function index()
   {
        try{
            $estates = Estate::where('status',1)->orderBy('name','ASC')->get(['name','ruc', 'owner', 'url_image', 'phone', 'address','email']);
            return response()->json([
                'success' => true,
                'code' => 'SUCCESS_QUERY',
                'status' => 200,
                'estates'=>$estates,
            ],200);
        } catch(Exception $e){
            return response()->json([
                'success' => true,
                'code' => 'ERROR_REQUEST',
                'status' => 500,
                'error'=>$e,
            ],500);
        }
   }
}
