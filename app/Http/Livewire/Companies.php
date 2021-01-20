<?php

namespace App\Http\Livewire;

use App\Company;
use Livewire\Component;
use Illuminate\Validation\Rule;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Companies extends Component
{
    use WithPagination;
    use WithFileUploads;

    protected $paginationTheme = 'bootstrap';

    protected $queryString = [
        'search' => ['except' => ''],
        'perPage' => ['except' => '5'],
    ];
    public $perPage = '10';
    public $search = '';

    public $name,$ruc,$owner,$url_image,$phone,$address,$email,$status = true;
    public  $data_id;
    public function render()
    {
        $companies = Company::where('name', 'LIKE', "%{$this->search}%")
            ->orWhere('ruc', 'LIKE', "%{$this->search}%")
            ->orWhere('owner', 'LIKE', "%{$this->search}%")
            ->orWhere('phone', 'LIKE', "%{$this->search}%")
            ->orWhere('address', 'LIKE', "%{$this->search}%")
            ->orWhere('email', 'LIKE', "%{$this->search}%")
            ->paginate($this->perPage);
        return view('livewire.companies',compact('companies'));
    }
    public function resetInputFields()
    {
        $this->name = '';
        $this->ruc = '';
        $this->owner = '';
        $this->url_image = '';
        $this->phone = '';
        $this->address = '';
        $this->email = '';
        $this->status = true;
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
    		'name'	=>	'required|unique:estates',
    		'ruc' => 'required|unique:estates',
            'email' => 'required|email|unique:estates',
            'address' => 'required',
            'status' => 'required'
        ]);
        $path = 'img/user.jpg';
        if ($this->url_image != '') {
            $this->validate(['url_image' => 'image'], ['url_image.image' => 'La imagen debe ser de formato: .jpg,.jpeg ó .png']);
            //save image
            $name = "file-" . time() . '.' . $this->url_image->getClientOriginalExtension();
            $path = 'companies/' . $this->url_image->storeAs('/', $name, 'companies');
        }

        $data =  [
            'name'=>$this->name,
            'ruc'=>$this->ruc,
            'owner'=>$this->owner,
            'url_image'=>$path,
            'phone'=>$this->phone,
            'address'=>$this->address,
            'email'=>$this->email,
            'status'=>$this->status
        ];
        Company::create($data);
        $this->alert('success','¡Registro creado con exíto!');
    	$this->resetInputFields();
    	$this->emit('studentStore');
    }

    public function edit($id)
    {
        $company = Company::findOrFail($id);
        $this->name = $company->name;
    	$this->ruc = $company->ruc;
        $this->url_image = $company->url_image;
        $this->email = $company->email;
        $this->phone = $company->phone;
        $this->status = $company->status;
        $this->address = $company->address;
        $this->owner = $company->owner;
        $this->data_id = $company->id;
    }

    public function update()
    {
        $validation = $this->validate([
            'name'	=>	['required',Rule::unique('companies')->ignore($this->data_id)],
    		'ruc' => ['required',Rule::unique('companies')->ignore($this->data_id)],
            'email' => ['required','email',Rule::unique('companies')->ignore($this->data_id)],
            'address' => 'required',
            'status' => 'required'
        ]);
        $data = Company::find($this->data_id);
        if ($this->url_image != $data->url_image) {
            $this->validate(['url_image' => 'image'], ['url_image.image' => 'La imagen debe ser de formato: .jpg,.jpeg ó .png']);
            //save image
            $name = "file-" . time() . '.' . $this->url_image->getClientOriginalExtension();
            $path = 'companies/' . $this->url_image->storeAs('/', $name, 'companies');
        } else {
            $path = $data->url_image;
        }
        $data->update([
            'name'=>$this->name,
            'ruc'=>$this->ruc,
            'owner'=>$this->owner,
            'url_image'=>$path,
            'phone'=>$this->phone,
            'address'=>$this->address,
            'email'=>$this->email,
            'status'=>$this->status
        ]);
        $this->alert('success','¡Registro modificado con exíto!');
        $this->resetInputFields();
        $this->emit('studentStore');
    }

    public function delete($id)
    {
        Company::find($id)->delete();
        $this->alert('success','¡Registro eliminado con exíto!');
    }
}
