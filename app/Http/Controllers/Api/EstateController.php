<?php

namespace App\Http\Controllers\Api;

use App\Estate;
use App\Veterinary;
use App\Employ;
use App\Income;
use App\Milking;
use App\Checkup;
use App\Animal_production;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Exception;
use Carbon\Carbon;
use Illuminate\Support\Collection;

use Illuminate\Support\Facades\Log;

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

    public function AnimalsProductionByMilking(Request $request, $id)
    {
        $time_milking = $request->query('time');
        //fechas
        $now = Carbon::now("America/Guayaquil");
        $date =  $now->format('Y-m-d');

        //coleccion de animae sd eprocuccion
        $animals = Animal_production::join('animals','animal_production.animal_id','=','animals.id')
        ->select('animal_production.id','animals.name','animals.code','animals.start_date','animals.url_image')
        ->where('animal_production.estate_id',$id)
        ->get();


        //ANIMALES YA ORÑADOS
        $income = null;
        $income = Income::where('estate_id',$id)->where('date',$date)->where('time_milking',$time_milking)->first(['id']);
        $list = new Collection();
        if(!is_null($income)){
            $animals_milinkgs = Milking::where('income_id',$income->id)->get(['id','animalproduction_id','income_id']);
            foreach( $animals as $k => $v){
                $animal_milking = null;
                $animal_milking =  $animals_milinkgs->firstWhere('animalproduction_id',$v->id);
                if(!is_null($animal_milking)){
                    unset($animals[$k]);
                }
            }
        }

        foreach( $animals as $k => $v){
            $item =[
                'id' => $v->id,
                'name' => $v->name,
                'code' => $v->code,
                'start_date' => $v->start_date,
                'url_image' => $v->url_image,
            ];
            $list->push($item);
        }
        //dd($list);

        return response()->json([
            'success'=>true,
            'animals'=>$list,
            'code'=>'SUCCESS_FOUND_ANIMALS',
            'status'=>200
        ],200);

    }

    public function milkingByEstate(Request $request, $id)
    {
        $now = Carbon::now("America/Guayaquil");
        $date =  $now->format('Y-m-d');
        $time = $now->format('H:i:s');
        $year = $now->year;

        $income  = null;
        $income = Income::where('estate_id',$id)->where('date',$date)->where('time_milking',$request->time_milking)->first();

        if(is_null($income)){
            $income = new Income();
            $income->estate_id = $id;
            $income->year = $year;
            $income->date = $date;
            $income->hour = $time;
            $income->total_liters = 0;
            $income->description = $request->description;

            //$income->status = $request->status;
            $income->time_milking = $request->time_milking;
            $income->status_milking = $request->status_milking;
            $income->save();
        }

        $animal = Animal_production::find($request->animalproduction_id);

        $milking = new Milking();
        $milking->income_id = $income->id;
        $milking->animalproduction_id = $animal->id;
        $milking->total_liters = $request->total_liters;
        $milking->year = $year;
        $milking->date = $date;
        $milking->hour = $time;
        $milking->save();

        ///TOTAL DE LITROS SUMATORIA
        $income->total_liters = $income->total_liters + $request->total_liters;
        $income->save();
        return $this->AnimalsProductionByMilking($request, $id);
    }
    public function CheckupsAnimalsByEstate()
    {
        $checkups = Checkup::join('animals','checkups.animal_id','=','animals.id')
        ->join('veterinaries','checkups.veterinarie_id','=','veterinaries.id')
        ->join('estates','checkups.estate_id','=','estates.id')
        ->select(
        'checkups.topic','checkups.date',
        'animals.id','animals.name','animals.code',
        'estates.name as name_estate',
        'veterinaries.name as name_vet','veterinaries.last_name as last_name_vet','veterinaries.url_image')
        ->where('checkups.status',1)
        ->get();
        return response()->json([
            'success'=>true,
            'checkups'=>$checkups,
            'code'=>'SUCCESS_FOUND_CHECKUPS',
            'status'=>200
        ],200);

    }


}
