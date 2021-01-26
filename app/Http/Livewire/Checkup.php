<?php

namespace App\Http\Livewire;
use App\Checkup as CheckUps;
use App\Estate;
use App\Animal;
use App\Veterinary;

use Livewire\Component;
use Livewire\WithPagination;

class Checkup extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    protected $queryString = [
        'search' => ['except' => ''],
        'perPage' => ['except' => '10'],
    ];
    public $perPage = '10';
    public $search = '';
    public $estate_filter = 0;

    public $animal_id, $veterinarie_id, $estate_id, $topic, $description, $date, $disease, $next_date, $status=true;
   // public $checkupslist=[];
   public $estates = [], $data_id;
   public $animals = [], $veterinaries=[];



    public function render()
    {
        $this->estates = Estate::all();
        $this->animals = Animal::all();
        $this->veterinaries = Veterinary::all();
        $checkupslist = CheckUps::orderBy('topic','DESC')
        ->where('topic', 'LIKE', "%{$this->search}%")
        ->orWhere('description', 'LIKE', "%{$this->search}%")
        ->orWhere('date', 'LIKE', "%{$this->search}%")
        ->paginate($this->perPage);
        return view('livewire.checkup',compact('checkupslist'));
    }
    public function resetInputFields()
    {
        $this->animal_id = '';
        $this->veterinarie_id = '';
        $this->estate_id = '';
        $this->topic = '';
        $this->description = '';
        $this->date = '';
        $this->disease = '';
        $this->next_date = '';
        $this->status = true;
        $this->data_id = '';
    }
    public function clear()
    {
        $this->search = '';
        $this->page = 1;
        $this->perPage = '10';
        $this->estate_filter = '';
    }

    public function store()
    {
    	$validation = $this->validate([
    		'animal_id'	=>	'required',
    		'veterinarie_id' => 'required',
            'estate_id' => 'required',
            'topic' => 'required',
            'description' => 'required',
           // 'date' => 'required',
        ]);

        $data =  [
            'animal_id'=>$this->animal_id,
            'veterinarie_id'=>$this->veterinarie_id,
            'estate_id'=>$this->estate_id,
            'topic'=>$this->topic,
            'description'=>$this->description,
            'date'=>$this->date,
            'disease'=>$this->disease,
            'next_date'=>$this->next_date,
            'status'=>$this->status
        ];
        CheckUps::create($data);
        $this->alert('success','¡Registro creado con exíto!');
    	$this->resetInputFields();
    	$this->emit('studentStore');
    }

    public function edit($id)
    {
        $checkup = CheckUps::findOrFail($id);
        $this->animal_id = $checkup->animal_id;
        $this->veterinarie_id = $checkup->veterinarie_id;
        $this->estate_id = $checkup->estate_id;
        $this->topic = $checkup->topic;
        $this->description = $checkup->description;
        $this->date = $checkup->date;
        $this->disease = $checkup->disease;
        $this->next_date = $checkup->next_date;
        $this->status = $checkup->status;
        $this->data_id = $checkup->id;


    }

    public function update()
    {
        $validation = $this->validate([
           'animal_id'	=>	'required',
    		'veterinarie_id' => 'required',
            'estate_id' => 'required',
            'topic' => 'required',
            'description' => 'required',
            'date' => 'required',
        ]);
        $data = CheckUps::find($this->data_id);
         //UPLOAD IMAGE
        $data->update([
            'animal_id'=>$this->animal_id,
            'veterinarie_id'=>$this->veterinarie_id,
            'estate_id'=>$this->estate_id,
            'topic'=>$this->topic,
            'description'=>$this->description,
            'date'=>$this->date,
            'disease'=>$this->disease,
            'next_date'=>$this->next_date,
            'status'=>$this->status
        ]);
        $this->alert('success','¡Registro modificado con exíto!');
        $this->resetInputFields();
        $this->emit('studentStore');
    }

    public function delete($id)
    {
        CheckUps::find($id)->delete();
        $this->alert('success','¡Registro eliminado con exíto!');
    }

}
