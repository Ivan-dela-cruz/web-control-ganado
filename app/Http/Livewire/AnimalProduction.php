<?php

namespace App\Http\Livewire;

use App\Estate;
use App\Animal;
use App\Animal_production;
use Livewire\Component;

class AnimalProduction extends Component
{
    public $animal_id, $estates,$name, $status = true, $code, $start_date, $input_search, $estate_id;
    public $action='POST';
    public function render()
    {
        $this->estates = Estate::all();
        return view('livewire.animal-production');
    }

    public function findAnimal()
    {
        $animal = null;
       
        $animal = Animal::where('estate_id',$this->estate_id)->where('code',$this->input_search)->first();
       
        if(!is_null($animal)){
            $this->code = $animal->code;
            $this->animal_id = $animal->id;
            $this->name = $animal->name;
            $this->start_date = $animal->start_date;
            $this->alert('success','¡Registro recuperado con exíto!');
        }else{

            $this->alert('warning','¡No se encontrarón registros!');
        }
    }
    
    public function store()
    {
        $validate = $this->validate([
            'animal_id'=>'required',
            'estate_id'=>'required',
            'status'=>'required'
            ]);
        $animal = null;
        $animal = Animal_production::where('animal_id',$this->animal_id)->count();
      
        if($animal == 0 ){
            Animal_production::create($validate);
            $this->alert('success','¡Animal registrado con exíto!');
            $this->resetInputs();
        }else{
            
            $this->alert('warning','¡El animal actualmente se encuentra ya está en producción!');
        }    
    }

    public function resetInputs()
    {
        $this->code ="";
        $this->animal_id = "";
        $this->name = "";
        $this->start_date = "";
    }
}
