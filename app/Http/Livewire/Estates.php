<?php


namespace App\Http\Livewire;
use App\Estate;
use Livewire\Component;
use Illuminate\Validation\Rule;
use Livewire\WithFileUploads;

class Estates extends Component
{
    use WithFileUploads;
    public $data_id,$name,$ruc,$owner,$url_image,$phone,$address,$email,$status = 1;
    public $estates, $action='POST';
    public function render()
    {
        $this->estates = Estate::all();
        return view('livewire.estates');
    }
    public function resetInputFields()
    {
    	$this->name = '';
    	$this->ruc = '';
        $this->url_image = '';
        $this->email = '';
        $this->phone = '';
        $this->status = '';
        $this->address = '';
        $this->data_id = '';
        $this->action = 'POST';
    }

    public function store()
    {
    	$validation = $this->validate([
    		'name'	=>	'required|unique:estates',
    		'ruc' => 'required|unique:estates',
            'email' => 'required|email|unique:estates',
            'address' => 'required',
            'status' => 'required',
            'url_image'=>'image'
        ]);
         //UPLOAD IMAGE
         $name = "file-" . time() . '.' .  $this->url_image->getClientOriginalExtension();
         $path =  $this->url_image->storeAs('/',$name,'estates');
 

        $data =  [
            'name'=>$this->name,
            'ruc'=>$this->ruc,
            'owner'=>$this->owner,
            'url_image'=>'estates/'.$name,
            'phone'=>$this->phone,
            'address'=>$this->address,
            'email'=>$this->email,
            'status'=>$this->status
        ];
        Estate::create($data);
        $this->alert('success','¡Registro creado con exíto!');
    	$this->resetInputFields();
    	$this->emit('studentStore');
    }

    public function edit($id)
    {
        $estates = Estate::findOrFail($id);
        $this->name = $estates->name;
    	$this->ruc = $estates->ruc;
        $this->url_image = $estates->url_image;
        $this->email = $estates->email;
        $this->phone = $estates->phone;
        $this->status = $estates->status;
        $this->address = $estates->address;
        $this->data_id = $estates->id;
        $this->action = 'PUT';
    }

    public function update()
    {
        $validation = $this->validate([
            'name'	=>	['required',Rule::unique('estates')->ignore($this->data_id)],
    		'ruc' => ['required',Rule::unique('estates')->ignore($this->data_id)],
            'email' => ['required','email',Rule::unique('estates')->ignore($this->data_id)],
            'address' => 'required',
            'status' => 'required',
            'url_image'=>'image'
        ]);
        $data = Estate::find($this->data_id);
         //UPLOAD IMAGE
        $name = "file-" . time() . '.' .  $this->url_image->getClientOriginalExtension();
        $path =  $this->url_image->storeAs('/',$name,'estates');

        $data->update([
            'name'=>$this->name,
            'ruc'=>$this->ruc,
            'owner'=>$this->owner,
            'url_image'=>'estates/'.$name,
            'phone'=>$this->phone,
            'address'=>$this->address,
            'email'=>$this->email,
            'status'=>$this->status
        ]);
        $this->alert('success','¡Registro modificado con exíto!');
        $this->resetInputFields();
        $this->emit('studentStore');
    }

    public function delete($id)
    {
        Estate::find($id)->delete();
        $this->alert('success','¡Registro eliminado con exíto!');
    }
}
