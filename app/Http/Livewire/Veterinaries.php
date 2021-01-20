<?php

namespace App\Http\Livewire;
use App\Veterinary;
use Livewire\Component;
use Illuminate\Validation\Rule;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Veterinaries extends Component
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

    public $data_id,$name,$last_name,$dni,$email,$phone1,$phone2, $direction, $status = 1;
    public function render()
    {
        $veterinaries = Veterinary::where('name', 'LIKE', "%{$this->search}%")
            ->orWhere('last_name', 'LIKE', "%{$this->search}%")
            ->orWhere('email', 'LIKE', "%{$this->search}%")
            ->orWhere('phone1', 'LIKE', "%{$this->search}%")
            ->orWhere('phone2', 'LIKE', "%{$this->search}%")
            ->orWhere('direction', 'LIKE', "%{$this->search}%")
            ->orWhere('created_at', 'LIKE', "%{$this->search}%")
            ->paginate($this->perPage);
        return view('livewire.veterinaries',compact('veterinaries'));
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

    public function clear()
    {
        $this->search = '';
        $this->page = 1;
        $this->perPage = '10';
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

        session()->flash('message', 'Veterinario registrado con exíto.');

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

        session()->flash('message', 'Veterinario actualizado con exíto.');

        $this->resetInputFields();

        $this->emit('veterinaryStore');
    }

    public function delete($id)
    {
        Veterinary::find($id)->delete();
        session()->flash('message', 'Veterinario eliminado con exíto.');
    }

}
