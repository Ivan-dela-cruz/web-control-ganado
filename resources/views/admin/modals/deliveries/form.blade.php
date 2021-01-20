<div class="row p-l-20 p-r-20">
<div class="col-md-6 form-group">
    <small  class="mr-3 text-primary">Compania</small>
    <select class="form-control" id="exampleFormControlInput3" wire:model="company_id">
        <option value="">Seleccione...</option>
        @foreach($companies as $company)
            <option value="{{$company->id}}">{{$company->name}}</option>
        @endforeach

    </select>
    @error('company_id')<span class="text-danger">{{ $message }}</span>
    @enderror
</div>
<div class="col-md-6 form-group">
    <small  class="mr-3 text-primary">Hacienda</small>
    <select class="form-control" id="exampleFormControlInput3" wire:model="estate_id">
        <option value="">Seleccione...</option>
        @foreach($estates as $estate)
            <option value="{{$estate->id}}">{{$estate->name}}</option>
        @endforeach

    </select>
    @error('estate_id')<span class="text-danger">{{ $message }}</span>
    @enderror
</div>
<div class="col-md-6 form-group">
    <small  class="mr-3 text-primary">RUC</small>
    <input type="text" id="exampleFormControlInput2" class="form-control" placeholder="" wire:model="ruc" />
    @error('ruc')<span class="text-danger">{{ $message }}</span>
    @enderror
</div>
<div class="col-md-6 form-group">
    <small  class="mr-3 text-primary">Conductor</small>
    <input type="text" id="exampleFormControlInput2" class="form-control" placeholder="" wire:model="driver" />
    @error('driver')<span class="text-danger">{{ $message }}</span>
    @enderror
</div>
<div class="col-md-6 form-group">
    <small  class="mr-3 text-primary">Año</small>
    <input type="text" id="exampleFormControlInput2" class="form-control" placeholder="" wire:model="year" />
    @error('year')<span class="text-danger">{{ $message }}</span>
    @enderror
</div>
<div class="col-md-6 form-group">
    <small  class="mr-3 text-primary">Fecha</small>
    <input type="date" id="exampleFormControlInput2" class="form-control" placeholder="" wire:model="date" />
    @error('date')<span class="text-danger">{{ $message }}</span>
    @enderror
</div>
<div class="col-md-6 form-group">
    <small  class="mr-3 text-primary">Hora</small>
    <input type="time" id="exampleFormControlInput2" class="form-control" placeholder="" wire:model="hour" />
    @error('hour')<span class="text-danger">{{ $message }}</span>
    @enderror
</div>
<div class="col-md-6 form-group">
    <small  class="mr-3 text-primary">Total de Litros</small>
    <input type="text" id="exampleFormControlInput2" class="form-control" placeholder="" wire:model="total_liters" />
    @error('total_liters')<span class="text-danger">{{ $message }}</span>
    @enderror
</div>
<div class="col-md-6 form-group">
    <small  class="mr-3 text-primary">Descripción</small>
    <input type="text" id="exampleFormControlInput2" class="form-control" placeholder="" wire:model="description" />
    @error('description')<span class="text-danger">{{ $message }}</span>
    @enderror
</div>
<div class="col-md-6 form-group">
    <small  class="mr-3 text-primary">Tipo</small>
    <input type="text" id="exampleFormControlInput2" class="form-control" placeholder="" wire:model="type" />
    @error('type')<span class="text-danger">{{ $message }}</span>
    @enderror
</div>
    <div class="col-md-6 form-group">
        <small  class="mr-3 text-primary">Estado</small>
        <div class="switch switch-info m-r-10">
            <input  wire:model="status"  type="checkbox" id="switch-i-1" checked>
            <label for="switch-i-1" class="cr"></label>
        </div>
    </div>
</div>
