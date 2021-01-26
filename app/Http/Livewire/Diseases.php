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
        'perPage' => ['except' => '10'],

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
        $this->status = 1;

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
        ],[
            'name.required' => 'Campo obligatorio.',
            'description.required' => 'Campo obligatorio.',
            'time_diseases.required' => 'Campo obligatorio.',
            'status.required' => 'Campo obligatorio.',
        ]);
        $data =  [
            'name'=>$this->name,
            'description'=>$this->description,
            'time_diseases'=>$this->time_diseases,
            'status'=> $this->status
        ];
        Disease::create($data);

        $this->alert('success', 'Enfermedad registrada con exíto.');

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
        ],[
            'name.required' => 'Campo obligatorio.',
            'description.required' => 'Campo obligatorio.',
            'time_diseases.required' => 'Campo obligatorio.',
            'status.required' => 'Campo obligatorio.',
        ]);

        $data = Disease::find($this->data_id);

        $data->update([
            'name'=>$this->name,
            'description'=>$this->description,
            'time_diseases'=>$this->time_diseases,
            'status'=> $this->status
        ]);

        $this->alert('success', 'Enfermedad actualizada con exíto.');

        $this->resetInputFields();

        $this->emit('diseaseStore');
    }

    public function delete($id)
    {
        Disease::find($id)->delete();
        $this->alert('success', 'Enfermedad eliminada con exíto.');
    }
}
