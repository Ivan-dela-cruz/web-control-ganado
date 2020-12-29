<div class="form-group">
    <label for="exampleFormControlInput1">Tipo </label>
    <input type="text" id="exampleFormControlInput1" class="form-control"  placeholder="Ingrese" wire:model="tipe_mastitis" />
    @error('tipe_mastitis')
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
    <label for="exampleFormControlInput2">Level</label>
    <input type="text" id="exampleFormControlInput2" class="form-control" placeholder="Slug" wire:model="level" />
    @error('level')<span class="text-danger">{{ $message }}</span>
    @enderror
</div>
<div class="form-group">
    <label for="exampleFormControlInput3">Tratamiento</label>
    <select class="form-control" id="exampleFormControlInput3" wire:model="treatment_id">
        <option value="">Seleccione</option>
        @foreach ($treatments as $treatment)
        <option value="{{ $treatment->id }}">{{$treatment->name}}</option>
        @endforeach
    </select>
    @error('treatment_id')<span class="text-danger">{{ $message }}</span>
    @enderror
</div>
<div class="form-group">
    <label for="exampleFormControlInput3">Animal</label>
    <select class="form-control" id="exampleFormControlInput3" wire:model="animal_production_id">
        <option value="">Seleccione</option>
        @foreach ($animals_production as $animal_production)
        <option value="{{ $animal_production->id }}">{{$animal_production->name}}</option>
        @endforeach
    </select>
    @error('animal_production_id')<span class="text-danger">{{ $message }}</span>
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