<div class="row p-l-20 p-r-20">
    <div class="col-md-6 form-group">
        <small class="mr-3 text-primary">Tipo</small>
        <input type="text" id="exampleFormControlInput1" class="form-control"
               wire:model="tipe_mastitis"/>
        @error('tipe_mastitis')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="col-md-6 form-group">
        <small class="mr-3 text-primary">Descripción</small>
        <input type="text" id="exampleFormControlInput2" class="form-control"
               wire:model="description"/>
        @error('description')<span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="col-md-6 form-group">
        <small class="mr-3 text-primary">Nivel</small>
        <input type="text" id="exampleFormControlInput2" class="form-control"  wire:model="level"/>
        @error('level')<span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="col-md-6 form-group">
        <small class="mr-3 text-primary">Tratamiento</small>
        <select class="form-control" id="exampleFormControlInput3" wire:model="treatment_id">
            <option value="">Seleccione</option>
            @foreach ($treatments as $treatment)
                <option value="{{ $treatment->id }}">{{$treatment->name}}</option>
            @endforeach
        </select>
        @error('treatment_id')<span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="col-md-6 form-group">
        <small class="mr-3 text-primary">Animal</small>
        <select class="form-control" id="exampleFormControlInput3" wire:model="animal_production_id">
            <option value="">Seleccione</option>
            @foreach ($animals_production as $animal_production)
                <option value="{{ $animal_production->id }}">
                    {{"[".$animal_production->animal->code."]"}} &nbsp;&nbsp;&nbsp;&nbsp; 
                    {{$animal_production->animal->name}}
                </option>
            @endforeach
        </select>
        @error('animal_production_id')<span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="col-md-6 form-group">
        <small class="mr-3 text-primary">Estado</small>
        <div class="switch switch-info m-r-10">
            <input wire:model="status" type="checkbox" id="switch-i-1" checked>
            <label for="switch-i-1" class="cr"></label>
        </div>
    </div>
</div>
