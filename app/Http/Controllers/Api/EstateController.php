<?php

namespace App\Http\Controllers\Api;

use App\Estate;
use App\Veterinary;
use App\Employ;
use App\Income;
use App\Milking;
use App\Animal_production;
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
            'code'=>'SUCCESS_FOUND_VETERINARIES',
            'status'=>200
        ],200);
    }
    public function AnimalsProductionByEstate($id)
    {
        $animals = Animal_production::join('animals','animal_production.animal_id','=','animals.id')
        ->select('animals.id','animals.name','animals.code','animals.start_date','animals.url_image')
        ->where('animal_production.estate_id',$id)
        ->get();
        return response()->json([
            'success'=>true,
            'animals'=>$animals,
            'code'=>'SUCCESS_FOUND_ANIMALS',
            'status'=>200
        ],200);

    }

    public function milkingByEstate(Request $request, $id)
    {
        $estate = Estate::find($id);
        $income  = null;
        $income = Income::where('estate_id',$id)->where('date',$request->date)->where('time_milking',$request->time_milking)->first();
       
        if(is_null($income)){
            $income = new Income();
            $income->estate_id = $estate->id;
            $income->year = $request->year;
            $income->date = $request->date;
            $income->hour = $request->hour;
            $income->total_liters = 0;
            $income->description = $request->description;
          
            //$income->status = $request->status;
            $income->time_milking = $request->time_milking;
            $income->status_milking = $request->status_milking;
            $income->save();
        }
       
        $animal = Animal_production::where('animal_id',$request->animalproduction_id)->first();
       
        $milking = new Milking();
        $milking->income_id = $income->id;
        $milking->animalproduction_id = $animal->id;
        $milking->total_liters = $request->total_liters;
        $milking->year = $request->year;
        $milking->date = $request->date;
        $milking->hour = $request->hour;
        $milking->save();
        
        $income->total_liters = $income->total_liters + $request->total_liters;
        $income->save();

        return response()->json([
            'success'=>true,
            'milking'=>$milking,
            'code'=>'SUCCESS_MILKING_REGISTERED',
            'status'=>200
        ],200);

    }
   
}
