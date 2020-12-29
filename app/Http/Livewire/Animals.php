<?php

namespace App\Http\Livewire;

use App\Animal;
use Livewire\Component;
use App\Estate;

class Animals extends Component
{
    public  $animals,$estates, $name, $code, $url_image,$start_date,$end_date,$status, $data_id,$estate_id;
    public function render()
    {
        $this->estates = Estate::all();
    	$this->animals = Animal::all();
    	
        return view('livewire.animals');
    }

    public function resetInputFields()
    {
    	$this->name = '';
        $this->code = '';
        $this->url_image = '';
        $this->start_date = '';
        $this->end_date = '';
        $this->status = '';
        $this->estate_id= '';
    }

    public function store()
    {
    	$validation = $this->validate([
    		'name'	=>	'required',
    		'code' => 'required',
            'url_image' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'status' => 'required',
            'estate_id' => 'required'      
    	]);
    	Animal::create($validation);
    	session()->flash('message', 'Animal creado con exíto.');
    	$this->resetInputFields();

    	$this->emit('animalStore');
    }

    public function edit($id)
    {
        $data = Animal::findOrFail($id);
        $this->name = $data->name;
        $this->code = $data->code;
        $this->url_image = $data->url_image;
        $this->start_date = $data->start_date;
        $this->end_date = $data->end_date;
        $this->estate_id = $data->estate_id;
        $this->data_id = $id;
        $this->status = $data->status ;
    }

    public function update()
    {
        $validate = $this->validate([
            'name'	=>	'required',
    		'code' => 'required',
            'url_image' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'status' => 'required',
            'estate_id' => 'required'
        ]);

        $data = Animal::find($this->data_id);

        $data->update([
            'name'       =>   $this->name,
            'code'         =>  $this->code,
            'url_image'         =>  $this->url_image,
            'start_date'         =>  $this->start_date,
            'end_date'         =>  $this->end_date,
            'status'            =>  $this->status,
            'estate_id'            =>  $this->estate_id
        ]);

        session()->flash('message', 'Animal actualizado con exíto.');

        $this->resetInputFields();

        $this->emit('animalStore');
    }

    public function delete($id)
    {
        Animal::find($id)->delete();
        session()->flash('message', 'Animal eliminado con exíto.');
    }
}
