<?php

namespace App\Http\Livewire;

use App\Employ;
use App\Estate;
use App\User;
use Livewire\Component;
use Illuminate\Validation\Rule;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Employes extends Component
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

    public $user_id, $estate_id, $name, $last_name, $dni, $url_image, $phone, $address, $email, $start_date, $end_date, $status = true;
    public $estates = [], $data_id;

    public function render()
    {
        $this->estates = Estate::where('status', 1)->get(['id', 'name']);
        $employes = Employ::where('name', 'LIKE', "%{$this->search}%")
            ->orWhere('last_name', 'LIKE', "%{$this->search}%")
            ->orWhere('dni', 'LIKE', "%{$this->search}%")
            ->orWhere('phone', 'LIKE', "%{$this->search}%")
            ->orWhere('address', 'LIKE', "%{$this->search}%")
            ->orWhere('email', 'LIKE', "%{$this->search}%")
            ->orWhere('start_date', 'LIKE', "%{$this->search}%")
            ->orWhere('end_date', 'LIKE', "%{$this->search}%")
            ->paginate($this->perPage);
        return view('livewire.employes', compact('employes'));
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

    public function clear()
    {
        $this->search = '';
        $this->page = 1;
        $this->perPage = '10';
    }

    public function store()
    {
        $validation = $this->validate([
            'name' => 'required|regex:/^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+$/u|max:255',
            'last_name' => 'required|regex:/^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+$/u|max:255',
            'email' => 'required|email|unique:users',
            'dni' => 'required|unique:employs|numeric|digits:10',
            'status' => 'required',
            'estate_id' => 'required',
            'address' => 'required',
            'start_date' => 'required',
        ], [
            'name.required' => 'Campo obligatorio.',
            'name.regex' => 'Nombre incorrecto.',
            'last_name.regex' => 'Nombre incorrecto.',
            'last_name.required' => 'Campo obligatorio.',
            'email.required' => 'Campo obligatorio.',
            'email.unique' => 'El correo ya esta en uso.',
            'email.email' => 'El correo es incorrecto.',
            'dni.required' => 'Campo obligatorio.',
            'dni.unique' => 'DNI ya esta en uso.',
            'dni.numeric' => 'DNI incorrecto.',
            'dni.digits' => 'DNI incorrecto.',
            'status.required' => 'Campo obligatorio.',
            'estate_id.required' => 'Campo obligatorio.',
            'address.required' => 'Campo obligatorio.',
            'start_date.required' => 'Campo obligatorio.',
        ]);

        if ($this->phone != '') {
            $this->validate([
                'phone' => 'numeric|digits:10',
            ], [
                'phone.numeric' => 'Teléfono incorrecto.',
                'phone.digits' => 'Teléfono incorrecto.',
            ]);
        }

        $path = 'img/user.jpg';
        if ($this->url_image != '') {
            $this->validate(['url_image' => 'image'], ['url_image.image' => 'La imagen debe ser de formato: .jpg,.jpeg ó .png']);
            //save image
            $name = "file-" . time() . '.' . $this->url_image->getClientOriginalExtension();
            $path = 'employees/' . $this->url_image->storeAs('/', $name, 'employees');
        }

        $password = bcrypt($this->dni);
        $user = User::create([
            'name' => $this->name,
            'last_name' => $this->last_name,
            'url_image' => $path,
            'phone' => $this->phone,
            'address' => $this->address,
            'email' => $this->email,
            'password' => $password
        ]);

        $user->assignRole('Empleado');
        $data = [
            'user_id' => $user->id,
            'estate_id' => $this->estate_id,
            'name' => $this->name,
            'last_name' => $this->last_name,
            'dni' => $this->dni,
            'url_image' => $path,
            'phone' => $this->phone,
            'address' => $this->address,
            'email' => $this->email,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'status' => $this->status
        ];
        Employ::create($data);
        $this->alert('success', 'Empleado registrado con exíto.');
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
            'name' => 'required|regex:/^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+$/u|max:255',
            'last_name' => 'required|regex:/^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+$/u|max:255',
            'email' => ['required', Rule::unique('employs')->ignore($this->data_id), 'email'],
            'dni' => ['required', Rule::unique('employs')->ignore($this->data_id), 'numeric', 'digits:10'],
            'status' => 'required',
            'estate_id' => 'required',
            'address' => 'required',
            'start_date' => 'required',
            'phone' => 'numeric|digits:10'
        ], [
            'name.required' => 'Campo obligatorio.',
            'name.regex' => 'Nombre incorrecto.',
            'last_name.regex' => 'Nombre incorrecto.',
            'last_name.required' => 'Campo obligatorio.',
            'email.required' => 'Campo obligatorio.',
            'email.unique' => 'El correo ya esta en uso.',
            'email.email' => 'El correo es incorrecto.',
            'dni.required' => 'Campo obligatorio.',
            'dni.unique' => 'DNI ya esta en uso.',
            'dni.numeric' => 'DNI incorrecto.',
            'dni.digits' => 'DNI incorrecto.',
            'status.required' => 'Campo obligatorio.',
            'estate_id.required' => 'Campo obligatorio.',
            'address.required' => 'Campo obligatorio.',
            'start_date.required' => 'Campo obligatorio.',
            'phone.numeric' => 'Teléfono incorrecto.',
            'phone.digits' => 'Teléfono incorrecto.',
        ]);
        $user = User::find($this->user_id);
        $data = Employ::find($this->data_id);

        if ($this->url_image != $data->url_image) {
            $this->validate(['url_image' => 'image'], ['url_image.image' => 'La imagen debe ser de formato: .jpg,.jpeg ó .png']);
            //save image
            $name = "file-" . time() . '.' . $this->url_image->getClientOriginalExtension();
            $path = 'employees/' . $this->url_image->storeAs('/', $name, 'employees');
        } else {
            $path = $data->url_image;
        }


        $user->update([
            'name' => $this->name,
            'last_name' => $this->last_name,
            'url_image' => $path,
            'phone' => $this->phone,
            'address' => $this->address,
            'email' => $this->email,
            'status' => $this->status
        ]);

        $data->update([
            'estate_id' => $this->estate_id,
            'name' => $this->name,
            'last_name' => $this->last_name,
            'dni' => $this->dni,
            'url_image' => $path,
            'phone' => $this->phone,
            'address' => $this->address,
            'email' => $this->email,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'status' => $this->status
        ]);

        $this->alert('success', 'Empleado actualizado con exíto.');
        $this->resetInputFields();
        $this->emit('studentStore');
    }

    public function delete($id, $user_id)
    {
        Employ::find($id)->delete();
        $user = User::find($user_id);
        $user->update([
            'status' => 0,
        ]);
        $this->alert('success', 'Empleado eliminado con exíto.');
    }

    public function activate($id)
    {
        $employee = Employ::find($id);
        $user = User::where('id', $employee->user_id)->first();
        $employee->update([
            'status' => 1,
        ]);
        $user->update([
            'status' => 1,
        ]);
        $this->alert('success', 'Empleado activado con exíto.', ['showCancelButton' => false,]);
    }
}
