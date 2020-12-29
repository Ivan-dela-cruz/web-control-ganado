<div class="form-group">
    <label for="exampleFormControlInput1">Nombre</label>
    <input type="text" id="exampleFormControlInput1" class="form-control"  placeholder="Ingrese" wire:model="name" />
    @error('name')
    <span class="text-danger">{{ $message }}</span>
    @enderror
</div>
<div class="form-group">
    <label for="exampleFormControlInput2">Codigo</label>
    <input type="text" id="exampleFormControlInput2" class="form-control" placeholder="Ingrese description" wire:model="code" />
    @error('code')<span class="text-danger">{{ $message }}</span>
    @enderror
</div>
 <div class="form-group">
    <label for="exampleFormControlInput2">Image</label>
    <input type="text" id="exampleFormControlInput2" class="form-control" placeholder="Slug" wire:model="url_image" />
    @error('url_image')<span class="text-danger">{{ $message }}</span>
    @enderror
</div>
<div class="form-group">
    <label for="exampleFormControlInput2">Slug</label>
    <input type="date" id="exampleFormControlInput2" class="form-control" placeholder="Slug" wire:model="start_date" />
    @error('start_date')<span class="text-danger">{{ $message }}</span>
    @enderror
</div>
<div class="form-group">
    <label for="exampleFormControlInput2">Slug</label>
    <input type="date" id="exampleFormControlInput2" class="form-control" placeholder="Slug" wire:model="end_date" />
    @error('end_date')<span class="text-danger">{{ $message }}</span>
    @enderror
</div>

<div class="form-group">
    <label for="exampleFormControlInput3">Ciclo</label>
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