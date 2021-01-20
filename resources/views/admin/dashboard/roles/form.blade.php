<form>
    <div class="row">

        <div class="col-sm-12">
            <div class="form-group fill">
                <label class="floating-label" for="Name">Nombre</label>
                <input type="text"  class="form-control" id="Name" wire:model="name" placeholder="">
                @error('name')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="col-sm-12">
            <div class="form-group fill">
                <label class="floating-label" for="description">Descripción</label>
                <input type="text"  class="form-control" id="description" wire:model="description" placeholder="">
                @error('description')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="col-sm-12">
            <div class="form-group fill">
                <label class="floating-label" for="status">Estado</label>
                <div class="switch switch-info d-inline m-r-10">
                    <input  wire:model="status"  type="checkbox" id="switch-i-1" checked>
                    <label for="switch-i-1" class="cr"></label>
                </div>

                @error('status')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="col-sm-12 ">
            <div class="form-group">
                <h6>Permisos</h6>
            </div>
            <div class="table-responsive">
                <table class="table table-sm table-hover table-striped text-center">
                    <thead>
                    <tr>
                        <th class="text-left">Módulo</th>
                        <th>Crear</th>
                        <th>Leer</th>
                        <th>Modificar</th>
                        <th>Eliminar</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($permissions->groupBy('modulo') as $k => $v)
                        <tr>
                            <td class="text-left">{{$k}}</td>
                            @foreach($v as $p)
                                <td><input wire:model='select_permissions.{{ $p->id}}' type="checkbox" name="select_permissions[]" value="{{$p->id}}"></td>
                            @endforeach
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="col-sm-12">
            @if($action=='POST')
                <button  wire:click.prevent="store()" class="btn btn-sm btn-primary ">Guardar</button>
            @else
                <button  wire:click.prevent="update()" class="btn btn-sm btn-success ">Actualizar</button>
            @endif
            <button wire:click.prevent="resetInputFields()" class="btn btn-sm btn-danger">Cancelar</button>
        </div>
    </div>
</form>
