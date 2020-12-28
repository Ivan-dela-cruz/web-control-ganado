<div class="form-group">
    <label for="exampleFormControlInput1">Hacienda</label>
    <select class="form-control" name="estate_id" wire:model="estate_id">
        <option value=""></option>
        @foreach($estates as $estate)
            <option value="{{$estate->id}}">{{$estate->name}}</option>
        @endforeach
        
    </select>
    @error('estate_id')
    <span class="text-danger">{{ $message }}</span>
    @enderror
</div>
<div class="form-group">
    <label for="exampleFormControlInput1">Nombre</label>
    <input type="text" id="exampleFormControlInput1" class="form-control"  placeholder="" wire:model="name" />
    @error('name')
    <span class="text-danger">{{ $message }}</span>
    @enderror
</div>
<div class="form-group">
    <label for="exampleFormControlInput2">Apellidos</label>
    <input type="text" id="exampleFormControlInput2" class="form-control" placeholder="" wire:model="last_name" />
    @error('last_name')<span class="text-danger">{{ $message }}</span>
    @enderror
</div>
<div class="form-group">
    <label for="exampleFormControlInput2">DNI</label>
    <input type="text" id="exampleFormControlInput2" class="form-control" placeholder="" wire:model="dni" />
    @error('dni')<span class="text-danger">{{ $message }}</span>
    @enderror
</div>
<div class="form-group">
    <label for="exampleFormControlInput2">Email</label>
    <input type="text" id="exampleFormControlInput2" class="form-control" placeholder="" wire:model="email" />
    @error('email')<span class="text-danger">{{ $message }}</span>
    @enderror
</div>
<div class="form-group">
    <label for="exampleFormControlInput2">Imagen</label>
    <input type="text" id="exampleFormControlInput2" class="form-control" placeholder="" wire:model="url_image" />
    @error('url_image')<span class="text-danger">{{ $message }}</span>
    @enderror
</div>
<div class="form-group">
    <label for="exampleFormControlInput2">Télefono</label>
    <input type="text" id="exampleFormControlInput2" class="form-control" placeholder="" wire:model="phone" />
    @error('phone')<span class="text-danger">{{ $message }}</span>
    @enderror
</div>
<div class="form-group">
    <label for="exampleFormControlInput2">Dirección</label>
    <input type="text" id="exampleFormControlInput2" class="form-control" placeholder="" wire:model="address" />
    @error('address')<span class="text-danger">{{ $message }}</span>
    @enderror
</div>
<div class="form-group">
    <label for="exampleFormControlInput2">Fecha de ingreso</label>
    <input type="date" id="exampleFormControlInput2" class="form-control" placeholder="" wire:model="start_date" />
    @error('start_date')<span class="text-danger">{{ $message }}</span>
    @enderror
</div>
<div class="form-group">
    <label for="exampleFormControlInput2">Fecha de salida</label>
    <input type="date" id="exampleFormControlInput2" class="form-control" placeholder="" wire:model="end_date" />
    @error('end_date')<span class="text-danger">{{ $message }}</span>
    @enderror
</div>
<div class="form-group">
    <label>Estado</label>
    <div class="switch switch-info d-inline m-r-10">
        <input wire:model="status" type="checkbox" id="switch-i-1">
        <label for="switch-i-1" class="cr"></label>
    </div>
    @error('status')<span class="text-danger">{{ $message }}</span>
    @enderror
</div>