<?php

namespace App\Http\Livewire;
use App\Employ;
use App\Estate;
use App\User;
use Livewire\Component;
use Illuminate\Validation\Rule;

class Employes extends Component
{
    public $user_id,$estate_id,$name,$last_name,$dni,$url_image,$phone,$address,$email,$start_date,$end_date,$status = true;
    public $employes, $estates = [], $data_id;
    public function render()
    {
        $this->estates = Estate::where('status',1)->get(['id','name']);
        $this->employes = Employ::all();
        return view('livewire.employes');
    }
    public function resetInputFields()
    {
    	$this->user_id = '';
        $this->estate_id = '';
        $this->name = '';
        $this->last_name = '';
        $this->dni = '';
        $this->url_image = '';
        $this->phone = '';
        $this->address = '';
        $this->email = '';
        $this->start_date = '';
        $this->end_date = '';
        $this->status = '';
        $this->data_id = '';
    }

    public function store()
    {
    	$validation = $this->validate([
    		'name'	=>	'required',
    		'last_name' => 'required',
            'email' => 'required|email|unique:users',
            'dni' => 'required|unique:employs',
            'status' => 'required'
        ]);
        $password = bcrypt($this->dni);
        $user = User::create([
            'name'=>$this->name,
            'last_name'=>$this->last_name,
            'url_image'=>$this->url_image,
            'phone'=>$this->phone, 
            'address'=>$this->address, 
            'email'=>$this->email,
            'password'=> $password
        ]);

        $data =  [
            'user_id'=>$user->id,
            'estate_id'=>$this->estate_id,
            'name'=>$this->name,
            'last_name'=>$this->last_name,
            'dni'=>$this->dni,
            'url_image'=>$this->url_image,
            'phone'=>$this->phone,
            'address'=>$this->address,
            'email'=>$this->email,
            'start_date'=>$this->start_date,
            'end_date'=>$this->end_date,
            'status'=>$this->status
        ];
        Employ::create($data);
        $this->alert('success', 'Registro creado con exíto.');
    	$this->resetInputFields();
    	$this->emit('studentStore');
    }

    public function edit($id)
    {
        $employe = Employ::findOrFail($id);
        $this->user_id = $employe->user_id;
        $this->estate_id = $employe->estate_id;
        $this->name = $employe->name;
        $this->last_name = $employe->last_name;
        $this->dni = $employe->dni;
        $this->url_image = $employe->url_image;
        $this->phone = $employe->phone;
        $this->address = $employe->address;
        $this->email = $employe->email;
        $this->start_date = $employe->start_date;
        $this->end_date = $employe->end_date;
        $this->status = $employe->status;
        $this->data_id = $id;
    }

    public function update()
    {
        $validation = $this->validate([
    		'name'	=>	'required',
    		'last_name' => 'required',
            'email' => ['required',Rule::unique('employs')->ignore($this->data_id)],
            'dni' => ['required',Rule::unique('employs')->ignore($this->data_id)],
            'status' => 'required'
        ]);
        $data = Employ::find($this->data_id);
        $data->update([
            'estate_id'=>$this->estate_id,
            'name'=>$this->name,
            'last_name'=>$this->last_name,
            'dni'=>$this->dni,
            'url_image'=>$this->url_image,
            'phone'=>$this->phone,
            'address'=>$this->address,
            'email'=>$this->email,
            'start_date'=>$this->start_date,
            'end_date'=>$this->end_date,
            'status'=>$this->status
        ]);

        $this->alert('success', 'Registro actualizado con exíto.');
        $this->resetInputFields();
        $this->emit('studentStore');
    }

    public function delete($id)
    {
        Employ::find($id)->delete();
        $this->alert('success', 'Registro eliminado con exíto.');
    }
}
