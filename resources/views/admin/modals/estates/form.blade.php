<div class="form-group">
    <label for="exampleFormControlInput1">Nombre</label>
    <input type="text" id="exampleFormControlInput1" class="form-control"  placeholder="" wire:model="name" />
    @error('name')
    <span class="text-danger">{{ $message }}</span>
    @enderror
</div>

<div class="form-group">
    <label for="exampleFormControlInput2">RUC</label>
    <input type="text" id="exampleFormControlInput2" class="form-control" placeholder="" wire:model="ruc" />
    @error('ruc')<span class="text-danger">{{ $message }}</span>
    @enderror
</div>
<div class="form-group">
    <label for="exampleFormControlInput2">Propietario</label>
    <input type="text" id="exampleFormControlInput2" class="form-control" placeholder="" wire:model="owner" />
    @error('owner')<span class="text-danger">{{ $message }}</span>
    @enderror
</div>
<div class="form-group">
    <label for="exampleFormControlInput2">Dirección</label>
    <input type="text" id="exampleFormControlInput2" class="form-control" placeholder="" wire:model="address" />
    @error('address')<span class="text-danger">{{ $message }}</span>
    @enderror
</div>

<div class="form-group">
    <label for="exampleFormControlInput2">Email</label>
    <input type="text" id="exampleFormControlInput2" class="form-control" placeholder="" wire:model="email" />
    @error('email')<span class="text-danger">{{ $message }}</span>
    @enderror
</div>
<div class="form-group">
    <label for="exampleFormControlInput2">Télefono</label>
    <input type="text" id="exampleFormControlInput2" class="form-control" placeholder="" wire:model="phone" />
    @error('phone')<span class="text-danger">{{ $message }}</span>
    @enderror
</div>
<div class="form-group">
    <label for="exampleFormControlInput2">Imagen</label>
    <div class="custom-file">
        <input type="file" class="custom-file-input" id="validatedCustomFile" wire:model="url_image">
        <label class="custom-file-label" for="validatedCustomFile">Subir imagen</label>
    </div>
    @error('url_image')<span class="text-danger">{{ $message }}</span>
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