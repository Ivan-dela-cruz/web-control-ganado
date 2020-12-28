<div class="form-group">
    <label for="exampleFormControlInput1">Nombre</label>
    <input type="text" id="exampleFormControlInput1" class="form-control"  placeholder="Ingrese" wire:model="name" />
    @error('name')
    <span class="text-danger">{{ $message }}</span>
    @enderror
</div>
<div class="form-group">
    <label for="exampleFormControlInput2">Descripción</label>
    <input type="text" id="exampleFormControlInput2" class="form-control" placeholder="Ingrese description" wire:model="description" />
    @error('description')<span class="text-danger">{{ $message }}</span>
    @enderror
</div>
 <div class="form-group">
    <label for="exampleFormControlInput2">Slug</label>
    <input type="text" id="exampleFormControlInput2" class="form-control" placeholder="Slug" wire:model="slug" />
    @error('slug')<span class="text-danger">{{ $message }}</span>
    @enderror
</div>
<div class="form-group">
    <label for="exampleFormControlInput3">Ciclo</label>
    <select class="form-control" id="exampleFormControlInput3" wire:model="level_id">
        <option value="">Seleccione</option>
        @foreach ($levels as $level)
        <option value="{{ $level->id }}">{{$level->name}}</option>
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