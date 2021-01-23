<?php

namespace App\Http\Livewire;

use App\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Spatie\Permission\Models\Role;
use Illuminate\Validation\Rule;

class Users extends Component
{
    use WithPagination;
    use WithFileUploads;

    protected $paginationTheme = 'bootstrap';

    protected $queryString = [
        'search' => ['except' => ''],
        'perPage' => ['except' => '10'],

    ];
    public $perPage = '10';
    public $search = '';

    public $data_id, $user_id, $name, $last_name;
    public $url_image, $email, $phone, $status = 1, $address, $password, $password_confirmation;

    public  $roles, $uRoles = null;
    public $roles_selected = null;
    public $view = 'create';


    public function render()
    {
        $users = User::where('name', 'LIKE', "%{$this->search}%")
            ->orWhere('last_name', 'LIKE', "%{$this->search}%")
            ->orWhere('email', 'LIKE', "%{$this->search}%")
            ->orWhere('phone', 'LIKE', "%{$this->search}%")
            ->orWhere('address', 'LIKE', "%{$this->search}%")
            ->orWhere('created_at', 'LIKE', "%{$this->search}%")
            ->paginate($this->perPage);

        $this->roles = Role::where('status', 1)->get(['id', 'name']);
        return view('livewire.users', compact('users'));
    }

    public function clear()
    {
        $this->search = '';
        $this->page = 1;
        $this->perPage = '10';
    }

    public function create(){
        $this->view = 'create';
        $this->emit('showCreate');//IMPORTANT!
        $this->resetInputFields();
    }

    public function store()
    {
        $this->validate([
            'name' => 'required',
            'last_name' => 'required',
            'phone' => 'required|max:10',
            'address' => 'required',
            // 'role_selected' => 'required',
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => 'required|confirmed|min:8',
            'password_confirmation' => 'required'
        ], [
            'name.required' => 'Campo obligatorio.',
            'last_name.required' => 'Campo obligatorio.',
            'phone.required' => 'Campo obligatorio.',
            'address.required' => 'Campo obligatorio.',
            'phone.number' => 'Teléfono incorrecto.',
            'phone.max' => 'Teléfono incorrecto.',
            // 'role_selected.required' => 'Seleccione un rol.',
            'email.required' => 'Campo obligatorio.',
            'email.email' => 'El correo no es valido.',
            'email.unique' => 'El correo ya esta en uso, intente con otro.',
            'password.required' => 'Campo obligatorio.',
            'password_confirmation.required' => 'Campo obligatorio.',
            'password.min' => 'Contraseña demasiado corta.',
            'password.confirmed' => 'No se ha confirmado la contraseña.',
        ]);

        $path = 'img/user.jpg';
        if ($this->url_image != '') {
            $this->validate(['url_image' => 'image'], ['url_image.image' => 'La imagen debe ser de formato: .jpg,.jpeg ó .png']);
            //save image
            $name = "file-" . time() . '.' . $this->url_image->getClientOriginalExtension();
            $path = 'users/' . $this->url_image->storeAs('/', $name, 'users');
        }
        // $this->validate();
        $data = [
            'name' => $this->name,
            'last_name' => $this->last_name,
            'phone' => $this->phone,
            'address' => $this->address,
            'email' => $this->email,
            'url_image' => $path,
            'password' => Hash::make($this->password),
            'status' => $this->status,
        ];

        $user = User::create($data);
        $user->roles()->sync($this->roles_selected);
        $this->alert('success', '¡Usuario creado con exíto!');
        $this->resetInputFields();
        $this->emit('studentStore');
    }

    public function edit($id)
    {
        $this->view = 'edit';
        $user = User::find($id);
        $this->name = $user->name;
        $this->last_name = $user->last_name;
        $this->url_image = $user->url_image;
        $this->phone = $user->phone;
        $this->address = $user->address;
        $this->email = $user->email;
        $this->status = $user->status;
        $this->data_id = $id;

        $this->uRoles = $user;
        $this->roles_selected = null;
        $this->emit('showUpdate');//IMPORTANT!
    }

    public function update()
    {
        $this->validate([
            'name' => 'required',
            'last_name' => 'required',
            'phone' => 'required|max:10',
            'address' => 'required',
            'email' => ['required', 'email',Rule::unique('users')->ignore($this->data_id)],

        ], [
            'name.required' => 'Campo obligatorio.',
            'last_name.required' => 'Campo obligatorio.',
            'phone.required' => 'Campo obligatorio.',
            'address.required' => 'Campo obligatorio.',
            'phone.number' => 'Teléfono incorrecto.',
            'phone.max' => 'Teléfono incorrecto.',
            'email.required' => 'Campo obligatorio.',
            'email.email' => 'El correo no es valido.',
            'email.unique' => 'El correo ya esta en uso, intente con otro.',
        ]);

        $user = User::find($this->data_id);
        if ($this->url_image != $user->url_image) {
            $this->validate(['url_image' => 'image'], ['url_image.image' => 'La imagen debe ser de formato: .jpg,.jpeg ó .png']);
            //save image
            $name = "file-" . time() . '.' . $this->url_image->getClientOriginalExtension();
            $path = 'users/' . $this->url_image->storeAs('/', $name, 'users');
        } else {
            $path = $user->url_image;
        }

        $user->update([
            'name' => $this->name,
            'last_name' => $this->last_name,
            'phone' => $this->phone,
            'address' => $this->address,
            'email' => $this->email,
            'url_image' => $path,
            'password' => Hash::make($this->password),
            'status' => $this->status,
        ]);

        if($this->roles_selected != null){
            $user->roles()->detach();
            $user->syncRoles($this->roles_selected);
        }
        $this->resetInputFields();
        $this->emit('modal');
        $this->alert('success', 'Usuario actualizado con exíto.');
        return redirect()->route('users');
    }

    public function resetInputFields()
    {
        $this->view = 'create';
        $this->name = '';
        $this->last_name = '';
        $this->url_image = '';
        $this->email = '';
        $this->address = '';
        $this->status = 1;
        $this->phone = '';
        $this->user_id = '';
        $this->password = '';
        $this->password_confirmation = '';
        $this->roles_selected = null ;
        $this->uRoles = null;

    }








    public function delete($id)
    {
        User::find($id)->delete();
        $this->alert('success', '¡Usuario eliminado con exíto!');
    }
}
