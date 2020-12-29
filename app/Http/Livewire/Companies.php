<?php

namespace App\Http\Livewire;

use App\Company;
use Livewire\Component;
use Illuminate\Validation\Rule;
class Companies extends Component
{
    public $name,$ruc,$owner,$url_image,$phone,$address,$email,$status = true;
    public $companies, $data_id;
    public function render()
    {
        $this->companies = Company::all();
        return view('livewire.companies');
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

    public function store()
    {
    	$validation = $this->validate([
    		'name'	=>	'required|unique:estates',
    		'ruc' => 'required|unique:estates',
            'email' => 'required|email|unique:estates',
            'address' => 'required',
            'status' => 'required'
        ]);
        $data =  [
            'name'=>$this->name,
            'ruc'=>$this->ruc,
            'owner'=>$this->owner,
            'url_image'=>$this->url_image,
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
        $data->update([
            'name'=>$this->name,
            'ruc'=>$this->ruc,
            'owner'=>$this->owner,
            'url_image'=>$this->url_image,
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
