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

   public $view = 'create', $sAnimal = 0;



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
    public function create(){
        $this->view = 'create';
        $this->emit('showCreate');//IMPORTANT!
        $this->resetInputFields();
    }

    public function resetInputFields()
    {
        $this->view = 'create';
        $this->sAnimal = 0;
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
           'date' => 'required',
        ],[
            'animal_id.required' => 'Campo obligatorio.',
            'veterinarie_id.required' => 'Campo obligatorio.',
            'estate_id.required' => 'Campo obligatorio.',
            'topic.required' => 'Campo obligatorio.',
            'description.required' => 'Campo obligatorio.',
            'date.required' => 'Campo obligatorio.',
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
        $this->view = 'edit';
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
        $this->sAnimal = $checkup->animal_id;
      //  dd($this->sAnimal);
        $this->emit('showUpdate');//IMPORTANT!


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
        ],[
            'animal_id.required' => 'Campo obligatorio.',
            'veterinarie_id.required' => 'Campo obligatorio.',
            'estate_id.required' => 'Campo obligatorio.',
            'topic.required' => 'Campo obligatorio.',
            'description.required' => 'Campo obligatorio.',
            'date.required' => 'Campo obligatorio.',
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
        //$this->emit('checkups');
        $this->alert('success','¡Registro modificado con exíto!');
        $this->resetInputFields();
        $this->emit('forceCloseModal');
    }

    public function delete($id)
    {
        CheckUps::find($id)->delete();
        $this->alert('success','¡Registro eliminado con exíto!');
    }

}
