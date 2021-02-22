<div class="row p-l-20 p-r-20">

    <div class="col-md-6 form-group">
        <small  class="mr-3 text-primary">Haciendas</small>
        <select wire:model="estate_id" class="form-control">
            <option value="">Seleccione</option>
            @foreach($estates as $estate)
                <option value="{{$estate->id}}"> {{$estate->name}} </option>
            @endforeach
        </select>
        @error('estate_id')<span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="col-md-6 form-group" >
        <small class="mr-3 text-primary">Animal</small>
        <select id="animal_id"  class=" mt-5 form-control" wire:model="animal_id">
            <option  value="">Seleccione</option>
            @foreach($animals as $animal)
                <option value="{{$animal->id}}"
                        @if($sAnimal > 0)
                            @if($animal->id == $sAnimal) selected="selected"@endif
                        @endif>
                    {{"[".$animal->code."]"}} &nbsp;&nbsp;&nbsp;&nbsp;
                    {{$animal->name}}
                </option>
            @endforeach
        </select>
        @error('animal_id')<span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="col-md-6 form-group">
        <small  class="mr-3 text-primary">Veterinarios</small>
        <select wire:model="veterinarie_id" class="form-control">
            <option  value="">Seleccione</option>
            @foreach($veterinaries as $veterinary)
                <option value="{{$veterinary->id}}"> {{$veterinary->name}} </option>
            @endforeach
        </select>
        @error('veterinarie_id')<span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="col-md-6 form-group">
        <small  class="mr-3 text-primary">Motivo</small>
        <input type="text" id="exampleFormControlInput1" class="form-control"  placeholder="" wire:model="topic" />
        @error('topic')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="col-md-6 form-group">
        <small  class="mr-3 text-primary">Descripción</small>
        <input type="text" id="exampleFormControlInput2" class="form-control" placeholder="" wire:model="description" />
        @error('description')<span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="col-md-6 form-group">
        <small  class="mr-3 text-primary">Fecha</small>
        <input type="date" id="exampleFormControlInput2" class="form-control" placeholder="" wire:model="date" />
        @error('date')<span class="text-danger">{{ $message }}</span>
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

