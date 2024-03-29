<?php

namespace App\Http\Livewire;

use AnimalTreatments;
use Livewire\Component;
use App\Treatment;
use App\Animal_production;
use App\Mastitis As Mastitiss;
use Livewire\WithPagination;
use phpDocumentor\Reflection\Types\This;
Use Illuminate\Support\Facades\DB;
class Mastitis extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    protected $queryString = [
        'search' => ['except' => ''],
        'perPage' => ['except' => '10'],

    ];
    public $perPage = '10';
    public $search = '';

    public  $animals_production,$treatments, $tipe_mastitis, $description, $level,$animal_production_id,$treatment_id,$status = 1;
   public $data_id;
    public $view = 'create', $sAnimal = 0;
    public function render()
    {

        $this->animals_production = Animal_production::where('status',1)->get();

        $mastitiss = Mastitiss::where('tipe_mastitis', 'LIKE', "%{$this->search}%")
            ->orWhere('description', 'LIKE', "%{$this->search}%")
            ->orWhere('level', 'LIKE', "%{$this->search}%")
            ->paginate($this->perPage);
        $this->treatments = Treatment::all();
        return view('livewire.mastitis',compact('mastitiss'));
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
    	$this->tipe_mastitis = '';
        $this->description = '';
        $this->level = '';
        $this->status = 1;
        $this->animal_production_id = '';
        $this->treatment_id= '';
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
    		'tipe_mastitis'	=>	'required',
    		'description' => 'required',
            'level' => 'required',
            'status' => 'required',
            'animal_production_id' => 'required',
            'treatment_id' => 'required'
    	],[
    	    'tipe_mastitis.required' =>'Campo obligatorio.',
    	    'description.required' =>'Campo obligatorio.',
    	    'level.required' =>'Campo obligatorio.',
    	    'status.required' =>'Campo obligatorio.',
    	    'animal_production_id.required' =>'Campo obligatorio.',
    	    'treatment_id.required' =>'Campo obligatorio.',
        ]);
    	Mastitiss::create($validation);
    	$this->alert('success', 'Mastitis registrada con exíto.');
    	$this->resetInputFields();

    	$this->emit('mastitisStore');
    }

    public function edit($id)
    {
        $this->view = 'edit';
        $data = Mastitiss::findOrFail($id);
        $this->tipe_mastitis = $data->tipe_mastitis;
        $this->description = $data->description;
        $this->level = $data->level;
        $this->status = $data->status;
        $this->animal_production_id = $data->animal_production_id;
        $this->treatment_id = $data->treatment_id;
        $this->data_id = $id;
        $this->emit('showUpdate');//IMPORTANT!
    }

    public function update()
    {
        $validation = $this->validate([
    		'tipe_mastitis'	=>	'required',
    		'description' => 'required',
            'level' => 'required',
            'status' => 'required',
            'animal_production_id' => 'required',
            'treatment_id' => 'required'
    	],[
            'tipe_mastitis.required' =>'Campo obligatorio.',
            'description.required' =>'Campo obligatorio.',
            'level.required' =>'Campo obligatorio.',
            'status.required' =>'Campo obligatorio.',
            'animal_production_id.required' =>'Campo obligatorio.',
            'treatment_id.required' =>'Campo obligatorio.',
        ]);

        $data = Mastitiss::find($this->data_id);

        $data->update([
            'tipe_mastitis'       =>   $this->tipe_mastitis,
            'description'         =>  $this->description,
            'level'         =>  $this->level,
            'status'         =>  $this->status,
            'animal_production_id'         =>  $this->animal_production_id,
            'treatment_id'            =>  $this->treatment_id
        ]);

        $this->alert('success', 'Mastitis actualizada con exíto.');

        $this->resetInputFields();

        $this->emit('forceCloseModal');
    }

    public function delete($id)
    {
        Mastitiss::find($id)->delete();
       $this->alert('success', 'Mastitis eliminada con exíto.');
    }
}
