<div class="form-group">
    <label for="exampleFormControlInput3">Companía</label>
    <select class="form-control" id="exampleFormControlInput3" wire:model="company_id">
        <option value=""></option>
        @foreach($companies as $company)
            <option value="{{$company->id}}">{{$company->name}}</option>
        @endforeach
       
    </select>
    @error('company_id')<span class="text-danger">{{ $message }}</span>
    @enderror
</div>
<div class="form-group">
    <label for="exampleFormControlInput3">Hacienda</label>
    <select class="form-control" id="exampleFormControlInput3" wire:model="estate_id">
        <option value=""></option>
        @foreach($estates as $estate)
            <option value="{{$estate->id}}">{{$estate->name}}</option>
        @endforeach
       
    </select>
    @error('estate_id')<span class="text-danger">{{ $message }}</span>
    @enderror
</div>


<div class="form-group">
    <label for="exampleFormControlInput2">RUC</label>
    <input type="text" id="exampleFormControlInput2" class="form-control" placeholder="" wire:model="ruc" />
    @error('ruc')<span class="text-danger">{{ $message }}</span>
    @enderror
</div>
<div class="form-group">
    <label for="exampleFormControlInput2">Conductor</label>
    <input type="text" id="exampleFormControlInput2" class="form-control" placeholder="" wire:model="driver" />
    @error('driver')<span class="text-danger">{{ $message }}</span>
    @enderror
</div>
<div class="form-group">
    <label for="exampleFormControlInput2">Year</label>
    <input type="text" id="exampleFormControlInput2" class="form-control" placeholder="" wire:model="year" />
    @error('year')<span class="text-danger">{{ $message }}</span>
    @enderror
</div>
<div class="form-group">
    <label for="exampleFormControlInput2">Fecha</label>
    <input type="date" id="exampleFormControlInput2" class="form-control" placeholder="" wire:model="date" />
    @error('date')<span class="text-danger">{{ $message }}</span>
    @enderror
</div>
<div class="form-group">
    <label for="exampleFormControlInput2">Hora</label>
    <input type="time" id="exampleFormControlInput2" class="form-control" placeholder="" wire:model="hour" />
    @error('hour')<span class="text-danger">{{ $message }}</span>
    @enderror
</div>
<div class="form-group">
    <label for="exampleFormControlInput2">Total de litros</label>
    <input type="text" id="exampleFormControlInput2" class="form-control" placeholder="" wire:model="total_liters" />
    @error('total_liters')<span class="text-danger">{{ $message }}</span>
    @enderror
</div>
<div class="form-group">
    <label for="exampleFormControlInput2">Descripción</label>
    <input type="text" id="exampleFormControlInput2" class="form-control" placeholder="" wire:model="description" />
    @error('description')<span class="text-danger">{{ $message }}</span>
    @enderror
</div>
<div class="form-group">
    <label for="exampleFormControlInput2">Tipo</label>
    <input type="text" id="exampleFormControlInput2" class="form-control" placeholder="" wire:model="type" />
    @error('type')<span class="text-danger">{{ $message }}</span>
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