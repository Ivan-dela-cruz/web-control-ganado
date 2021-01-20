<?php

namespace App\Http\Livewire;

use App\Animal;
use Livewire\Component;
use App\Estate;
use Illuminate\Validation\Rule;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Animals extends Component
{
    use WithFileUploads;
    use WithPagination;


    protected $paginationTheme = 'bootstrap';

    protected $queryString = [
        'search' => ['except' => ''],
        'perPage' => ['except' => '5'],

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
        $animals = Animal::where(function ($query) {
            $query->when($this->estate_filter > 0, function ($q) {
                $q->where('estate_id', $this->estate_filter);
            });
            $query->when($this->search != '', function ($q) {
                $q->orWhere('name', 'LIKE', "%{$this->search}%");
                $q->orWhere('code', 'LIKE', "%{$this->search}%");
                $q->orWhere('start_date', 'LIKE', "%{$this->search}%");
                $q->orWhere('end_date', 'LIKE', "%{$this->search}%");
            });
        })
            ->paginate($this->perPage);

        return view('livewire.animals', compact('animals'));
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
    }

    public function store()
    {

        $validation = $this->validate([
            'name' => 'required',
            'code' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'status' => 'required',
            'estate_id' => 'required'
        ]);
        //UPLOAD IMAGE
        $path = 'img/user.jpg';
        if ($this->url_image != '') {
            $this->validate(['url_image' => 'image'], ['url_image.image' => 'La imagen debe ser de formato: .jpg,.jpeg ó .png']);
            //save image
            $name = "file-" . time() . '.' . $this->url_image->getClientOriginalExtension();
            $path = 'animals/' . $this->url_image->storeAs('/', $name, 'animals');
        }

        $data = [
            'name' => $this->name,
            'code' => $this->code,
            'url_image' => $path,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'status' => $this->status,
            'estate_id' => $this->estate_id,
        ];

        Animal::create($data);


        $this->alert('success', 'Animal creado con exíto.');
        $this->resetInputFields();

        $this->emit('animalStore');
    }

    public function edit($id)
    {
        $data = Animal::findOrFail($id);
        $this->name = $data->name;
        $this->code = $data->code;
        $this->url_image = $data->url_image;
        $this->start_date = $data->start_date;
        $this->end_date = $data->end_date;
        $this->estate_id = $data->estate_id;
        $this->data_id = $id;
        $this->status = $data->status;
    }

    public function update()
    {
        $validate = $this->validate([
            'name' => 'required',
            'code' => 'required',
            'url_image' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'status' => 'required',
            'estate_id' => 'required'
        ]);
        //UPLOAD IMAGE

        $data = Animal::find($this->data_id);
        if ($this->url_image != $data->url_image) {
            $this->validate(['url_image' => 'image'], ['url_image.image' => 'La imagen debe ser de formato: .jpg,.jpeg ó .png']);
            //save image
            $name = "file-" . time() . '.' . $this->url_image->getClientOriginalExtension();
            $path = 'animals/' . $this->url_image->storeAs('/', $name, 'animals');
        } else {
            $path = $data->url_image;
        }
        $data->update([
            'name' => $this->name,
            'code' => $this->code,
            'url_image' => $path,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'status' => $this->status,
            'estate_id' => $this->estate_id
        ]);
        $this->alert('success', 'Animal actualizado con exíto.');
        $this->resetInputFields();

        $this->emit('animalStore');
    }

    public function delete($id)
    {
        Animal::find($id)->delete();
        $this->alert('success', 'Animal actualizado con exíto.');
    }
}
