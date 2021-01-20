<div class="row p-l-20 p-r-20">
    <div class="col-md-6 form-group">
        <small class="mr-3 text-primary">Nombres</small>
        <input type="text" id="exampleFormControlInput1" class="form-control" placeholder="" wire:model="name"/>
        @error('name')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="col-md-6 form-group">
        <small class="mr-3 text-primary">Apellidos</small>
        <input type="text" id="exampleFormControlInput2" class="form-control" placeholder="" wire:model="last_name"/>
        @error('last_name')<span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="col-md-6 form-group">
        <small class="mr-3 text-primary">DNI</small>
        <input type="text" id="exampleFormControlInput2" class="form-control" placeholder="" wire:model="dni"/>
        @error('dni')<span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="col-md-6 form-group">
        <small class="mr-3 text-primary">Correo</small>
        <input type="text" id="exampleFormControlInput2" class="form-control" placeholder="" wire:model="email"/>
        @error('email')<span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="col-md-6 form-group">
        <small class="mr-3 text-primary">Teléfono Principal</small>
        <input type="text" id="exampleFormControlInput2" class="form-control" placeholder="" wire:model="phone1"/>
        @error('phone1')<span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="col-md-6 form-group">
        <small class="mr-3 text-primary">Teléfono Secundario</small>
        <input type="text" id="exampleFormControlInput2" class="form-control" placeholder="" wire:model="phone2"/>
        @error('phone2')<span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="col-md-6 form-group">
        <small class="mr-3 text-primary">Dirección</small>
        <input type="text" id="exampleFormControlInput2" class="form-control" placeholder="" wire:model="direction"/>
        @error('direction')<span class="text-danger">{{ $message }}</span>
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
