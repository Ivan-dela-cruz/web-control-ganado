<div class="form-group">
    <label for="exampleFormControlInput1">Nombre</label>
    <input type="text" id="exampleFormControlInput1" class="form-control"  placeholder="Ingrese" wire:model="name" />
    @error('name')
    <span class="text-danger">{{ $message }}</span>
    @enderror
</div>
<div class="form-group">
    <label for="exampleFormControlInput2">Código</label>
    <input type="text" id="exampleFormControlInput2" class="form-control" placeholder="Ingrese description" wire:model="code" />
    @error('code')<span class="text-danger">{{ $message }}</span>
    @enderror
</div>
<div class="form-group">
    <div class="input-group mb-3">                        
        <div class="input-group-prepend">
            @if($url_image =='')
                <img src="{{asset('img/user.jpg')}}" alt="user image" class="img-radius align-top m-r-15" style="width:40px;">
            @else
                <img src="{{asset($url_image)}}" alt="user image" class="img-radius align-top m-r-15" style="width:40px;">
            @endif
        </div>
        <div class="custom-file">
            <input type="file" class="custom-file-input" id="inputGroupFile01" wire:model="url_image">
            <label class="custom-file-label" for="inputGroupFile01" >Subir imagen</label>
        </div>
    </div>
    @error('url_image')<span class="text-danger">{{ $message }}</span>
    @enderror
</div>
<div class="form-group">
    <label for="exampleFormControlInput2">Inicio</label>
    <input type="date" id="exampleFormControlInput2" class="form-control" placeholder="Slug" wire:model="start_date" />
    @error('start_date')<span class="text-danger">{{ $message }}</span>
    @enderror
</div>
<div class="form-group">
    <label for="exampleFormControlInput2">Fin</label>
    <input type="date" id="exampleFormControlInput2" class="form-control" placeholder="Slug" wire:model="end_date" />
    @error('end_date')<span class="text-danger">{{ $message }}</span>
    @enderror
</div>
<div class="form-group">
    <label for="exampleFormControlInput3">Hacienda</label>
    <select class="form-control" id="exampleFormControlInput3" wire:model="estate_id">
        <option value="">Seleccione</option>
        @foreach ($estates as $estate)
        <option value="{{ $estate->id }}">{{$estate->name}}</option>
        @endforeach
    </select>
    @error('status')<span class="text-danger">{{ $message }}</span>
    @enderror
</div>
<div class="form-group">
    <label for="exampleFormControlInput3">Estado</label>
    <select class="form-control" id="exampleFormControlInput3" wire:model="status">
        <option value="">Select</option>
        <option value="1">Activo</option>
        <option value="0">Inactivo</option>
    </select>
    @error('status')<span class="text-danger">{{ $message }}</span>
    @enderror
</div>