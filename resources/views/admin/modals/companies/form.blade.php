<div class="row p-l-20 p-r-20">
    <div class="col-md-6 form-group">
        <small  class="mr-3 text-primary">Nombre</small>
        <input type="text" id="exampleFormControlInput1" class="form-control" placeholder="" wire:model="name"/>
        @error('name')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="col-md-6 form-group">
        <small  class="mr-3 text-primary">RUC</small>
        <input type="text" id="exampleFormControlInput2" class="form-control" placeholder="" wire:model="ruc"/>
        @error('ruc')<span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="col-md-6 form-group">
        <small  class="mr-3 text-primary">Propietario</small>
        <input type="text" id="exampleFormControlInput2" class="form-control" placeholder="" wire:model="owner"/>
        @error('owner')<span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="col-md-6 form-group">
        <small  class="mr-3 text-primary">Dirección</small>
        <input type="text" id="exampleFormControlInput2" class="form-control" placeholder="" wire:model="address"/>
        @error('address')<span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="col-md-6 form-group">
        <small  class="mr-3 text-primary">Correo</small>
        <input type="text" id="exampleFormControlInput2" class="form-control" placeholder="" wire:model="email"/>
        @error('email')<span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="col-md-6 form-group">
        <small  class="mr-3 text-primary">Teléfono</small>
        <input type="text" id="exampleFormControlInput2" class="form-control" placeholder="" wire:model="phone"/>
        @error('phone')<span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="col-md-6 form-group">
        <small  class="text-primary">Imagen</small>
        <div class="input-group">
            <div class="input-group-prepend">
                @if($url_image == '')
                    <img src="{{asset('img/user.jpg')}}" alt="user image" class="img-radius align-top m-r-15" style="width:40px;">
                @else
                    <img src="{{asset($url_image)}}" alt="user image" class="img-radius align-top m-r-15" style="width:40px;">
                @endif
            </div>
            <div class="custom-file">
                <input type="file" class="custom-file-input" id="inputGroupFile01" wire:model="url_image" accept="image/x-png,image/jpg,image/jpeg" >
                <label class="custom-file-label" for="inputGroupFile01" >Subir imagen</label>
            </div>
        </div>
        @error('url_image')<span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="col-md-6 form-group">
        <small  class="mr-3 text-primary">Estado</small>
        <div class="switch switch-info m-r-10">
            <input wire:model="status" type="checkbox" id="switch-i-1">
            <label for="switch-i-1" class="cr"></label>
        </div>
        @error('status')<span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
</div>
