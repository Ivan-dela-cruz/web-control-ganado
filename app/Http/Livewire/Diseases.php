<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Disease;
use Livewire\WithPagination;

class Diseases extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    protected $queryString = [
        'search' => ['except' => ''],
        'perPage' => ['except' => '5'],

    ];
    public $perPage = '10';
    public $search = '';

    public $data_id,$name, $description,$time_diseases,$status = 1;
    public function render()
    {
        $diseases = Disease::where('name', 'LIKE', "%{$this->search}%")
            ->orWhere('description', 'LIKE', "%{$this->search}%")
            ->orWhere('time_diseases', 'LIKE', "%{$this->search}%")
            ->paginate($this->perPage);
        return view('livewire.diseases', compact('diseases'));
    }

    public function resetInputFields()
    {
    	$this->name = '';
        $this->description = '';
        $this->time_diseases = '';
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
            'description' => 'required',
            'time_diseases' => 'required',
            'status' => 'required'
        ]);
        $data =  [
            'name'=>$this->name,
            'description'=>$this->description,
            'time_diseases'=>$this->time_diseases,
            'status'=> $this->status
        ];
        Disease::create($data);

        session()->flash('message', 'Enfermedad creada con exíto.');

    	$this->resetInputFields();

    	$this->emit('diseaseStore');
    }

    public function edit($id)
    {
        $disease = Disease::findOrFail($id);
        $this->name = $disease->name;
        $this->description = $disease->description;
        $this->time_diseases = $disease->time_diseases;
        $this->status = $disease->status;
        $this->data_id = $id;
    }

    public function update()
    {
        $validation = $this->validate([
    		'name'	=>	'required',
            'description' => 'required',
            'time_diseases' => 'required',
            'status' => 'required'
        ]);

        $data = Disease::find($this->data_id);

        $data->update([
            'name'=>$this->name,
            'description'=>$this->description,
            'time_diseases'=>$this->time_diseases,
            'status'=> $this->status
        ]);

        session()->flash('message', 'Enfermedad actualizada con exíto.');

        $this->resetInputFields();

        $this->emit('diseaseStore');
    }

    public function delete($id)
    {
        Disease::find($id)->delete();
        session()->flash('message', 'Enfermedad eliminada con exíto.');
    }
}
