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
        'perPage' => ['except' => '5'],

    ];
    public $perPage = '10';
    public $search = '';

    public  $animals_production,$treatments, $tipe_mastitis, $description, $level,$animal_production_id,$treatment_id,$status = 1;
   public $data_id;
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
    public function resetInputFields()
    {
    	$this->tipe_mastitis = '';
        $this->description = '';
        $this->level = '';
        $this->status = '';
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
    	]);
    	Mastitiss::create($validation);
    	session()->flash('message', 'Mastitis registrada con exíto.');
    	$this->resetInputFields();

    	$this->emit('mastitisStore');
    }

    public function edit($id)
    {
        $data = Mastitiss::findOrFail($id);
        $this->tipe_mastitis = $data->tipe_mastitis;
        $this->description = $data->description;
        $this->level = $data->level;
        $this->status = $data->status;
        $this->animal_production_id = $data->animal_production_id;
        $this->treatment_id = $data->treatment_id;
        $this->data_id = $id;
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

        session()->flash('message', 'Mastitis actualizada con exíto.');

        $this->resetInputFields();

        $this->emit('animalStore');
    }

    public function delete($id)
    {
        Mastitiss::find($id)->delete();
        session()->flash('message', 'Mastitis eliminada con exíto.');
    }
}
