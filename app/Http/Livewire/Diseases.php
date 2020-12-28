<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Disease;
class Diseases extends Component
{
    public $diseases, $data_id,$name, $description,$time_diseases,$status;
    public function render()
    {
        $this->diseases = Disease::all();
        return view('livewire.diseases');
    }

    public function resetInputFields()
    {
    	$this->name = '';
        $this->description = '';
        $this->time_diseases = '';
        $this->status = '';
      
    }

    public function store()
    {
    	$validation = $this->validate([
    		'name'	=>	'required',
            'description' => 'required',
            'time_diseases' => 'required',
            'status' => 'required'
        ]);
        $data =  [
            'name'=>$this->name,
            'description'=>$this->description,
            'time_diseases'=>$this->time_diseases,
            'status'=> $this->status
        ];
        Disease::create($data);
        
        session()->flash('message', 'Enfermedad creado con exíto.');
        
    	$this->resetInputFields();

    	$this->emit('diseaseStore');
    }

    public function edit($id)
    {
        $disease = Disease::findOrFail($id);
        $this->name = $disease->name;
        $this->description = $disease->description;
        $this->time_diseases = $disease->time_diseases;
        $this->status = $disease->status;
        $this->data_id = $id;
    }

    public function update()
    {
        $validation = $this->validate([
    		'name'	=>	'required',
            'description' => 'required',
            'time_diseases' => 'required',
            'status' => 'required'
        ]);

        $data = Disease::find($this->data_id);

        $data->update([
            'name'=>$this->name,
            'description'=>$this->description,
            'time_diseases'=>$this->time_diseases,
            'status'=> $this->status
        ]);

        session()->flash('message', 'Enfermedad actualizado con exíto.');

        $this->resetInputFields();

        $this->emit('diseaseStore');
    }

    public function delete($id)
    {
        Disease::find($id)->delete();
        session()->flash('message', 'Enfermedad eliminado con exíto.');
    }
}
