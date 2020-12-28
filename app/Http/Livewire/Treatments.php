<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Treatment;
class Treatments extends Component
{
    public $treatments, $data_id,$name, $description,$status;
    public function render()
    {
        $this->treatments = Treatment::all();
        return view('livewire.treatments');
    }
    public function resetInputFields()
    {
    	$this->name = '';
    	$this->description = '';
        $this->status = '';
      
    }

    public function store()
    {
    	$validation = $this->validate([
    		'name'	=>	'required',
    		'description' => 'required',
            'status' => 'required'
        ]);
        $data =  [
            'name'=>$this->name,
            'description'=>$this->description,
            'status'=> $this->status
        ];
        Treatment::create($data);
        
        session()->flash('message', 'tratamiento creado con exíto.');
        
    	$this->resetInputFields();

    	$this->emit('treatmentStore');
    }

    public function edit($id)
    {
        $treatment = Treatment::findOrFail($id);
        $this->name = $treatment->name;
    	$this->description = $treatment->description;
        $this->status = $treatment->status;
        $this->data_id = $id;
    }

    public function update()
    {
        $validation = $this->validate([
    		'name'	=>	'required',
    		'description' => 'required',
            'status' => 'required'
        ]);

        $data = Treatment::find($this->data_id);

        $data->update([
            'name'=>$this->name,
            'description'=>$this->description,
            'status'=> $this->status
        ]);

        session()->flash('message', 'Tratamiento actualizado con exíto.');

        $this->resetInputFields();

        $this->emit('treatmentStore');
    }

    public function delete($id)
    {
        Treatment::find($id)->delete();
        session()->flash('message', 'Tratamiento eliminado con exíto.');
    }
}
