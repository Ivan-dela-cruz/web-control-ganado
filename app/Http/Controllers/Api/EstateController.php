<?php

namespace App\Http\Controllers\Api;

use App\Estate;
use App\Veterinary;
use App\Employ;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Exception;
class EstateController extends Controller
{
   public function index()
   {
        try{
            $estates = Estate::orderBy('name','ASC')->get(['id','name','ruc', 'owner', 'url_image', 'phone', 'address','email']);
            
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
   public function genaralInformation($id)
   {
       $object  = [
           'employes'=>'23',
           'animal_production'=>'56',
           'animal_disease'=>'23',
           'total_milk'=>'12',
           'estate_id'=>$id
       ];

       return response()->json([
           'success' => true,
           'info'=>$object,
           'code'=> 'SUCCESS_FOUND_INFO',
           'status'=>200
       ],200);
   }

   public function employesByEstate($id){
        $employes = Employ::orderBy('name')->where('estate_id',$id)->get(['id','name','last_name','url_image','dni','address','email','start_date','end_date']);
        return response()->json([
            'success'=>true,
            'employes'=>$employes,
            'code'=>'SUCCESS_FOUND_EMPLOYES',
            'status'=>200
        ],200);
    }
   
    public function veterinariesByEstate($id){
        $veterinaries = Veterinary::orderBy('name')->get([ 'id', 'name', 'last_name', 'dni', 'email', 'phone1','phone2','direction']);
        return response()->json([
            'success'=>true,
            'veterinaries'=>$veterinaries,
            'code'=>'SUCCESS_FOUND_EMPLOYES',
            'status'=>200
        ],200);
    }
   
}