<?php

namespace App\Http\Livewire;

use App\User;
use Livewire\Component;
use Spatie\Permission\Models\Role;
use Illuminate\Validation\Rule;

class Users extends Component
{
    public $users, $roles, $roles_selected=[]; 
    public $data_id, $user_id,$name, $last_name;
    public $url_image, $email, $phone, $status = true,$address, $password,$confirm_password;
    
    
    public function render()
    {
        $this->users = User::all();
     
        $this->roles = Role::where('status',1)->get(['id','name']);
        return view('livewire.users');
    }
    public function resetInputFields()
    {
    	$this->name = '';
    	$this->last_name = '';
        $this->url_image = '';
        $this->email = '';
        $this->address = '';
        $this->status = false;
        $this->phone = '';
        $this->user_id = '';
        $this->password = '';
        $this->confirm_password = '';
        $this->roles_selected = [];

    }

    public function store()
    {
    	$validation = $this->validate([
    		'name'	=>	'required',
    		'last_name' => 'required',
            'email' => 'required|email|unique:users',
            'status' => 'required',
            'password'=>'required|min:8',
            'confirm_password'=>'required|same:password'
        ]);
       
        $password = bcrypt($this->password);
        $user = User::create([
            'name'=>$this->name,
            'last_name'=>$this->last_name,
            'url_image'=>$this->url_image,
            'phone'=>$this->phone, 
            'address'=>$this->address, 
            'email'=>$this->email,
            'password'=> $password,
            'status'=> $this->status
            ]);
        $user->roles()->sync($this->roles_selected);
        $this->alert('success', '¡Usuario creado con exíto!');
    	$this->resetInputFields();

    	$this->emit('studentStore');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        $this->name = $user->name;
    	$this->last_name = $user->last_name;
        $this->url_image = $user->url_image;
        $this->phone = $user->phone;
        $this->address = $user->address;
        $this->email = $user->email;
        $this->status = $user->status;
        $this->data_id = $id;

        $roles =  Role::where('status',1)->get(['id']);
        $list = $user->roles;
        $cont = 1;
        $data_list = [];
        foreach($roles as $role){
           $find_role = $list->firstWhere('id',$role->id);
           if(!isset($find_role)){ $data_list[$cont] = false; }
           else{$data_list[$cont] =  $find_role->id; }
           $cont++;
        }
        $this->roles_selected = $data_list;
       
    }

    public function update()
    {
       
        $validation = $this->validate([
    		'name'	=>	'required',
    		'last_name' => 'required',
            'email' => ['required',Rule::unique('users')->ignore($this->data_id)],
            'status' => 'required'
        ]);

        $user = User::find($this->data_id);
        
        $user->update([
            'name'=>$this->name,
            'last_name'=>$this->last_name,
            'url_image'=>$this->url_image,
            'phone'=>$this->phone, 
            'address'=>$this->address, 
            'email'=>$this->email,
            'status'=> $this->status
        ]);
        
        
        $user->roles()->detach();
        $user->syncRoles($this->roles_selected);
        $this->alert('success', '¡Usuario actualizado con exíto!');

        $this->resetInputFields();

        $this->emit('studentStore');
    }

    public function delete($id)
    {
        User::find($id)->delete();
        $this->alert('success', '¡Usuario eliminado con exíto!');
    }
}
