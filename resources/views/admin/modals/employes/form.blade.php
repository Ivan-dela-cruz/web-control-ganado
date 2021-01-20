<div class="row p-l-20 p-r-20">
    <div class="col-md-6 form-group">
        <small  class="text-primary">Hacienda</small>
        <select class="form-control" name="estate_id" wire:model="estate_id">
            <option value="">Seleccione...</option>
            @foreach($estates as $estate)
                <option value="{{$estate->id}}">{{$estate->name}}</option>
            @endforeach

        </select>
        @error('estate_id')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="col-md-6 form-group">
        <small  class="text-primary">Nombres</small>
        <input type="text" id="exampleFormControlInput1" class="form-control"  placeholder="" wire:model="name" />
        @error('name')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="col-md-6 form-group">
        <small  class="text-primary">Apellidos</small>
        <input type="text" id="exampleFormControlInput2" class="form-control" placeholder="" wire:model="last_name" />
        @error('last_name')<span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="col-md-6 form-group">
        <small  class="text-primary">DNI</small>
        <input type="text" id="exampleFormControlInput2" class="form-control" placeholder="" wire:model="dni" />
        @error('dni')<span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="col-md-6 form-group">
        <small  class="text-primary">Correo</small>
        <input type="text" id="exampleFormControlInput2" class="form-control" placeholder="" wire:model="email" />
        @error('email')<span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="col-md-6 form-group">
        <small  class="text-primary">Imagen</small>
        <div class="input-group">
            <div class="input-group-prepend">
                @if($url_image == '')
                    <img src="{{asset('img/user.jpg')}}" alt="user image" class="img-radius align-top m-r-15" style="width:40px; height: 40px">
                @else
                    <img src="{{asset($url_image)}}" alt="user image" class="img-radius align-top m-r-15" style="width:40px; height: 40px">
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
        <small  class="text-primary">Teléfono</small>
        <input type="text" id="exampleFormControlInput2" class="form-control" placeholder="" wire:model="phone" />
        @error('phone')<span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="col-md-6 form-group">
        <small  class="text-primary">Dirección</small>
        <input type="text" id="exampleFormControlInput2" class="form-control" placeholder="" wire:model="address" />
        @error('address')<span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="col-md-6 form-group">
        <small  class="text-primary">Fecha de Ingreso</small>
        <input type="date" id="exampleFormControlInput2" class="form-control" placeholder="" wire:model="start_date" />
        @error('start_date')<span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="col-md-6 form-group">
        <small  class="text-primary">Fecha de Salida</small>
        <input type="date" id="exampleFormControlInput2" class="form-control" placeholder="" wire:model="end_date" />
        @error('end_date')<span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="col-md-6 form-group">
        <small  class="text-primary">Estado</small>
        <div class="switch switch-info m-r-10">
            <input wire:model="status" type="checkbox" id="switch-i-1">
            <label for="switch-i-1" class="cr"></label>
        </div>
        @error('status')<span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
</div>
