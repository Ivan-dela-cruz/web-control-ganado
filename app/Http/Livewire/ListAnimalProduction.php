<?php

namespace App\Http\Livewire;

use App\Animal;
use Livewire\Component;
use App\Estate;
use App\Animal_production;
use Illuminate\Validation\Rule;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class ListAnimalProduction extends Component
{
    use WithFileUploads;
    use WithPagination;


    protected $paginationTheme = 'bootstrap';

    protected $queryString = [
        'search' => ['except' => ''],
        'perPage' => ['except' => '10'],

    ];
    public $perPage = '10';
    public $search = '';
    public $estate_filter = 0;

    public $estates, $name, $code, $url_image, $start_date, $end_date, $status = 1, $data_id, $estate_id;

    public function render()
    {
        if ($this->search != '') {
            $this->estate_filter = 0;
        }
        $this->estates = Estate::all();
        $animals = Animal_production::join('animals','animal_production.animal_id','=','animals.id')
        ->select(
            'animals.estate_id','animals.name','animals.code','animals.url_image','animals.start_date',
            'animal_production.created_at', 'animal_production.id', 'animal_production.status'

        )
        ->where(function ($query) {
            $query->when($this->estate_filter > 0, function ($q) {
                $q->where('animals.estate_id', $this->estate_filter);
            });
            $query->when($this->search != '', function ($q) {
                $q->orWhere('animals.name', 'LIKE', "%{$this->search}%");
                $q->orWhere('animals.code', 'LIKE', "%{$this->search}%");
                $q->orWhere('animals.start_date', 'LIKE', "%{$this->search}%");
            });
        })
            ->paginate($this->perPage);
       
        return view('livewire.list-animal-production', compact('animals'));
    }

    public function resetInputFields()
    {
        $this->name = '';
        $this->code = '';
        $this->url_image;
        $this->start_date = '';
        $this->end_date = '';
        $this->status = '';
        $this->estate_id = '';
    }

    public function clear()
    {
        $this->search = '';
        $this->page = 1;
        $this->perPage = '10';
        $this->estate_filter = '';
    }

    public function edit($id)
    {
        $a = Animal_production::find($id);
        if($a->status){
            $a->status = false;
        }
        else{
            $a->status = true;
        }
        $a->save();
         
        $this->alert('success', 'Animal actualizado con exíto.');
    }
    public function delete($id)
    {
        Animal_production::find($id)->delete();
        $this->alert('success', 'Animal eliminado con exíto.');
    }
}
