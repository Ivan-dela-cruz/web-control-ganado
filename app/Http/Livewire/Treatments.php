<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Treatment;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Treatments extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    protected $queryString = [
        'search' => ['except' => ''],
        'perPage' => ['except' => '5'],

    ];
    public $perPage = '10';
    public $search = '';

    public  $data_id,$name, $description,$status = 1;
    public function render()
    {
        $treatments = Treatment::where('name', 'LIKE', "%{$this->search}%")
            ->orWhere('description', 'LIKE', "%{$this->search}%")
            ->paginate($this->perPage);
        return view('livewire.treatments', compact('treatments'));
    }
    public function resetInputFields()
    {
    	$this->name = '';
    	$this->description = '';
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
            'status' => 'required'
        ],[
            'name.required' => 'Campo obligatorio.',
            'description.required' => 'Campo obligatorio.',
            'status.required' => 'Campo obligatorio.',
            ]);
        $data =  [
            'name'=>$this->name,
            'description'=>$this->description,
            'status'=> $this->status
        ];
        Treatment::create($data);

        $this->alert('success', 'Tratamiento registrado con exíto.');

    	$this->resetInputFields();

    	$this->emit('treatmentStore');
    }

    public function edit($id)
    {
        $treatment = Treatment::findOrFail($id);
        $this->name = $treatment->name;
    	$this->description = $treatment->description;
        $this->status = $treatment->status;
        $this->data_id = $id;
    }

    public function update()
    {
        $validation = $this->validate([
    		'name'	=>	'required',
    		'description' => 'required',
            'status' => 'required'
        ],[
            'name.required' => 'Campo obligatorio.',
            'description.required' => 'Campo obligatorio.',
            'status.required' => 'Campo obligatorio.',
        ]);

        $data = Treatment::find($this->data_id);

        $data->update([
            'name'=>$this->name,
            'description'=>$this->description,
            'status'=> $this->status
        ]);

        $this->alert('success', 'Tratamiento actualizado con exíto.');

        $this->resetInputFields();

        $this->emit('treatmentStore');
    }

    public function delete($id)
    {
        Treatment::find($id)->delete();
        $this->alert('success', 'Tratamiento eliminado con exíto.');
    }
}
