<?php


namespace App\Http\Livewire;
use App\Estate;
use Livewire\Component;
use Illuminate\Validation\Rule;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use App\Scopes\StatusScope;

class Estates extends Component
{
    use WithPagination;
    use WithFileUploads;

    protected $paginationTheme = 'bootstrap';

    protected $queryString = [
        'search' => ['except' => ''],
        'perPage' => ['except' => '10'],
    ];
    public $perPage = '10';
    public $search = '';

    public $data_id,$name,$ruc,$owner,$url_image,$phone,$address,$email,$status = 1;
    public $action='POST';
    public function render()
    {
        $estates = Estate::where('name', 'LIKE', "%{$this->search}%")
            ->orWhere('ruc', 'LIKE', "%{$this->search}%")
            ->orWhere('owner', 'LIKE', "%{$this->search}%")
            ->orWhere('phone', 'LIKE', "%{$this->search}%")
            ->orWhere('address', 'LIKE', "%{$this->search}%")
            ->orWhere('email', 'LIKE', "%{$this->search}%")
            ->withoutGlobalScope(Estate::class)
            ->paginate($this->perPage);
        return view('livewire.estates',compact('estates'));
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
        $this->owner = '';
        $this->action = 'POST';
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
    		'name'	=>	'required|unique:estates|max:255',
    		'ruc' => 'required|unique:estates|numeric|digits:13',
            'email' => 'required|email|unique:estates',
            'address' => 'required',
            'owner' => 'required',
            'status' => 'required',
            'phone' => 'required|numeric|digits:10',
        ],[
            'name.required' => 'Campo obligatorio.',
            'name.unique' => 'Ya existe una Hacienda con ese nombre.',
            'ruc.required' => 'Campo obligatorio.',
            'ruc.numeric' => 'El ruc debe ser numérico.',
            'ruc.digits' => 'RUC incorrecto.',
            'email.required' => 'Campo obligatorio.',
            'email.email' => 'El correo no es valido.',
            'email.unique' => 'El correo ya esta en uso, intente con otro.',
            'address.required' => 'Campo obligatorio.',
            'owner.required' => 'Campo obligatorio.',
            'status.required' => 'Campo obligatorio.',
            'phone.required' => 'Campo obligatorio.',
            'phone.numeric' => 'Teléfono incorrecto.',
            'phone.digits' => 'Teléfono incorrecto.',
        ]);

         //UPLOAD IMAGE
        $path = 'img/user.jpg';
        if ($this->url_image != '') {
            $this->validate(['url_image' => 'image'], ['url_image.image' => 'La imagen debe ser de formato: .jpg,.jpeg ó .png']);
            //save image
            $name = "file-" . time() . '.' . $this->url_image->getClientOriginalExtension();
            $path = 'estates/' . $this->url_image->storeAs('/', $name, 'estates');
        }


        $data =  [
            'name'=>$this->name,
            'ruc'=>$this->ruc,
            'owner'=>$this->owner,
            'url_image'=>$path,
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
        $this->owner = $estates->owner;
        $this->data_id = $estates->id;
        $this->action = 'PUT';
    }

    public function update()
    {
        $validation = $this->validate([
            'name'	=>	['required',Rule::unique('estates')->ignore($this->data_id)],
    		'ruc' => ['required',Rule::unique('estates')->ignore($this->data_id), 'numeric','digits:13'],
            'email' => ['required','email',Rule::unique('estates')->ignore($this->data_id)],
            'address' => 'required',
            'status' => 'required',
            'owner' => 'required',
            'phone' => 'required|numeric|digits:10',
        ],[
            'name.required' => 'Campo obligatorio.',
            'name.unique' => 'Ya existe una Hacienda con ese nombre.',
            'ruc.required' => 'Campo obligatorio.',
            'ruc.digits' => 'RUC incorrecto.',
            'ruc.numeric' => 'El ruc debe ser numérico.',
            'email.required' => 'Campo obligatorio.',
            'email.email' => 'El correo no es valido.',
            'email.unique' => 'El correo ya esta en uso, intente con otro.',
            'address.required' => 'Campo obligatorio.',
            'owner.required' => 'Campo obligatorio.',
            'status.required' => 'Campo obligatorio.',
            'phone.required' => 'Campo obligatorio.',
            'phone.numeric' => 'Teléfono incorrecto.',
            'phone.digits' => 'Teléfono incorrecto.',
        ]);
        $data = Estate::find($this->data_id);
         //UPLOAD IMAGE

        if ($this->url_image != $data->url_image) {
            $this->validate(['url_image' => 'image'], ['url_image.image' => 'La imagen debe ser de formato: .jpg,.jpeg ó .png']);
            //save image
            $name = "file-" . time() . '.' . $this->url_image->getClientOriginalExtension();
            $path = 'estates/' . $this->url_image->storeAs('/', $name, 'estates');
        } else {
            $path = $data->url_image;
        }

        $data->update([
            'name'=>$this->name,
            'ruc'=>$this->ruc,
            'owner'=>$this->owner,
            'url_image'=>$path,
            'phone'=>$this->phone,
            'address'=>$this->address,
            'email'=>$this->email,
            'status'=>$this->status
        ]);
        $this->alert('success','¡Registro actializado con exíto!');
        $this->resetInputFields();
        $this->emit('studentStore');
    }

    public function delete($id)
    {
        Estate::find($id)->delete();
        $this->alert('success','¡Registro eliminado con exíto!');
    }

    /*public function rules()
    {

        //name, last_name,username,birth_date, gender, address, province, city, phone, url_image, email, password, status
        return [
            'ci' => 'required|numeric|unique:users|digits:10',
            'name'=>'required|regex:/^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+$/u|max:255',
            'last_name'=>'required|regex:/^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+$/u|max:255',
            'address'=>'required|string|max:255',
            'phone'=>'required||numeric|digits:10',]
    }*/

}
