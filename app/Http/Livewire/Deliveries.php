<?php

namespace App\Http\Livewire;

use App\Delivery;
use App\Company;
use App\Estate;
use Livewire\Component;
use Livewire\WithPagination;

class Deliveries extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    protected $queryString = [
        'search' => ['except' => ''],
        'perPage' => ['except' => '5'],

    ];
    public $perPage = '10';
    public $search = '';
    public $estate_id,$company_id,$ruc,$driver,$year,$date,$hour,$total_liters,$description,$type,$status = true;
    public $data_id,$companies,$estates;

    public function render()
    {
        $deliveries = Delivery::where('ruc', 'LIKE', "%{$this->search}%")
            ->orWhere('driver', 'LIKE', "%{$this->search}%")
            ->orWhere('total_liters', 'LIKE', "%{$this->search}%")
            ->orWhere('description', 'LIKE', "%{$this->search}%")
            ->paginate($this->perPage);
        $this->companies = Company::all();
        $this->estates = Estate::all();
        return view('livewire.deliveries',compact('deliveries'));
    }
    public function resetInputFields()
    {
    	$this->estate_id = '';
        $this->company_id = '';
        $this->ruc = '';
        $this->driver = '';
        $this->year = '';
        $this->date = '';
        $this->hour = '';
        $this->total_liters = '';
        $this->description = '';
        $this->type = '';
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
    		'estate_id'	=>	'required',
    		'company_id' => 'required',
            'ruc' => 'required',
            'driver' => 'required',
            'status' => 'required',
            'type' => 'required',
        ]);

        $data =  [
            'estate_id'=>$this->estate_id,
            'company_id'=>$this->company_id,
            'ruc'=>$this->ruc,
            'driver'=>$this->driver,
            'year'=>$this->year,
            'date'=>$this->date,
            'hour'=>$this->hour,
            'total_liters'=>$this->total_liters,
            'description'=>$this->description,
            'type'=>$this->type,
            'status'=>$this->status
        ];
        Delivery::create($data);

        $this->alert('success','¡Registro creado con exíto!');

    	$this->resetInputFields();

    	$this->emit('studentStore');
    }

    public function edit($id)
    {
        $delivery = Delivery::findOrFail($id);
        $this->estate_id = $delivery->estate_id;
        $this->company_id = $delivery->company_id;
        $this->ruc = $delivery->ruc;
        $this->driver = $delivery->driver;
        $this->year = $delivery->year;
        $this->date = $delivery->date;
        $this->hour = $delivery->hour;
        $this->total_liters = $delivery->total_liters;
        $this->description = $delivery->description;
        $this->type = $delivery->type;
        $this->status = $delivery->status;
        $this->data_id = $id;
    }

    public function update()
    {
        $validation = $this->validate([
    		'estate_id'	=>	'required',
    		'company_id' => 'required',
            'ruc' => 'required',
            'driver' => 'required',
            'status' => 'required',
            'type' => 'required',
        ]);

        $data = Delivery::find($this->data_id);

        $data->update([
            'estate_id'=>$this->estate_id,
            'company_id'=>$this->company_id,
            'ruc'=>$this->ruc,
            'driver'=>$this->driver,
            'year'=>$this->year,
            'date'=>$this->date,
            'hour'=>$this->hour,
            'total_liters'=>$this->total_liters,
            'description'=>$this->description,
            'type'=>$this->type,
            'status'=>$this->status
        ]);

        $this->alert('success','¡Registro actualizado con exíto!');

        $this->resetInputFields();

        $this->emit('studentStore');
    }

    public function delete($id)
    {
        Delivery::find($id)->delete();
        $this->alert('success','¡Registro eliminado con exíto!');
    }
}
