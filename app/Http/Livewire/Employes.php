<?php

namespace App\Http\Livewire;
use App\Employ;
use App\User;
use Livewire\Component;

class Employes extends Component
{
    public $user_id,$estate_id,$name,$last_name,$url_image,$phone,$address,$email,$start_date,$end_date,$status = true;
    public $employes, $data_id;
    public function render()
    {
        $this->employes = Employ::all();
        return view('livewire.employes');
    }
    public function resetInputFields()
    {
    	$this->user_id = '';
        $this->estate_id = '';
        $this->name = '';
        $this->last_name = '';
        $this->url_image = '';
        $this->phone = '';
        $this->address = '';
        $this->email = '';
        $this->start_date = '';
        $this->end_date = '';
        $this->status = '';
    }

    public function store()
    {
    	$validation = $this->validate([
    		'name'	=>	'required',
    		'last_name' => 'required',
            'email' => 'required|email|unique:users',
            'dni' => 'required|unique:students',
            'status' => 'required'
        ]);
        $password = bcrypt($this->dni);
        $user = User::create(['name'=>$this->name,'email'=>$this->email,'password'=>$password]);
        $data =  [
            'user_id'=>$user->id,
            'name'=>$this->name,
            'last_name'=>$this->last_name,
            'url_image'=> $this->url_image,
            'email'=> $this->email,
            'dni'=> $this->dni,
            'status'=> $this->status
        ];
        Employ::create($data);
        
        session()->flash('message', 'Estudiante creado con exíto.');
        
    	$this->resetInputFields();

    	$this->emit('studentStore');
    }

    public function edit($id)
    {
        $student = Employ::findOrFail($id);
        $this->name = $student->name;
    	$this->last_name = $student->last_name;
        $this->url_image = $student->url_image;
        $this->email = $student->email;
        $this->dni = $student->dni;
        $this->status = $student->status;
        $this->data_id = $id;
    }

    public function update()
    {
        $validation = $this->validate([
    		'name'	=>	'required',
    		'last_name' => 'required',
            'email' => ['required',Rule::unique('users')->ignore($this->data_id)],
            'dni' => ['required',Rule::unique('students')->ignore($this->data_id)],
            'status' => 'required'
        ]);

        $data = Employ::find($this->data_id);

        $data->update([
            'name'=>$this->name,
            'last_name'=>$this->last_name,
            'url_image'=> $this->url_image,
            'email'=> $this->email,
            'dni'=> $this->dni,
            'status'=> $this->status
        ]);

        session()->flash('message', 'Estudante actualizado con exíto.');

        $this->resetInputFields();

        $this->emit('studentStore');
    }

    public function delete($id)
    {
        Employ::find($id)->delete();
        session()->flash('message', 'Estudiante eliminado con exíto.');
    }
}
