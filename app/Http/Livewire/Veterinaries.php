<?php

namespace App\Http\Livewire;
use App\Veterinary;
use Livewire\Component;
use Illuminate\Validation\Rule;

class Veterinaries extends Component
{
    public $veterinaries, $data_id,$name,$last_name,$dni,$email,$phone1,$phone2, $direction, $status;
    public function render()
    {
        $this->veterinaries = Veterinary::all();
        return view('livewire.veterinaries');
    }
    public function resetInputFields()
    {
    	$this->name = '';
        $this->last_name = '';
        $this->dni = '';
        $this->email = '';
        $this->phone1 = '';
        $this->phone2 = '';
        $this->direction = '';
        $this->status = '';
      
    }

    public function store()
    {
    	$validation = $this->validate([
    		'name'	=>	'required',
            'last_name' => 'required',
            'dni' => 'required',
            'email' => 'required',
            'phone1' => 'required',
            'phone2' => 'required',
            'direction' => 'required',
            'status' => 'required'
        ]);

        $data =  [
            'name'=>$this->name,
            'last_name'=>$this->last_name,
            'dni'=>$this->dni,
            'email'=>$this->email,
            'phone1'=>$this->phone1,
            'phone2'=>$this->phone2,
            'direction'=>$this->direction,
            'status'=> $this->status
        ];
        Veterinary::create($data);
        
        session()->flash('message', 'Veterinaria creado con exíto.');
        
    	$this->resetInputFields();

    	$this->emit('veterinaryStore');
    }

    public function edit($id)
    {
        $veterinary = Veterinary::findOrFail($id);
        $this->name = $veterinary->name;
        $this->last_name = $veterinary->last_name;
        $this->dni = $veterinary->dni;
        $this->email = $veterinary->email;
        $this->phone1 = $veterinary->phone1;
        $this->phone2 = $veterinary->phone2;
        $this->direction = $veterinary->direction;
        $this->status = $veterinary->status;
        $this->data_id = $id;
    }

    public function update()
    {
        $validation = $this->validate([
    		'name'	=>	'required',
            'last_name' => 'required',
            'dni' => 'required',
            'email' => 'required',
            'phone1' => 'required',
            'phone2' => 'required',
            'direction' => 'required',
            'status' => 'required'
        ]);

        $data = Veterinary::find($this->data_id);

        $data->update([
            'name'=>$this->name,
            'last_name'=>$this->last_name,
            'dni'=>$this->dni,
            'email'=>$this->email,
            'phone1'=>$this->phone1,
            'phone2'=>$this->phone2,
            'direction'=>$this->direction,
            'status'=> $this->status
        ]);

        session()->flash('message', 'Veterinaria actualizado con exíto.');

        $this->resetInputFields();

        $this->emit('veterinaryStore');
    }

    public function delete($id)
    {
        Veterinary::find($id)->delete();
        session()->flash('message', 'Veterinaria eliminado con exíto.');
    }
  
}
