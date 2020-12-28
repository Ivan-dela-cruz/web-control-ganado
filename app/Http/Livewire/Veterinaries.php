<?php

namespace App\Http\Livewire;
use App\Veterinary;
use Livewire\Component;
use Illuminate\Validation\Rule;

class Veterinaries extends Component
{
    public $veterinaries, $data_id,$name, $direction, $status;
    public function render()
    {
        $this->veterinaries = Veterinary::all();
        return view('livewire.veterinaries');
    }

  
}
