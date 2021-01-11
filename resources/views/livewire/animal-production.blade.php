<div>
    <div class="row">
  
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div class="row pr-4 pl-4" >
                        <select wire:model="estate_id" class="form-control col-md-4" name="state_id" id="" aria-label="" aria-describedby="basic-addon1" >
                            <option  value="">Hacienda</option>
                            @foreach($estates as $estate)
                                <option value="{{$estate->id}}">{{$estate->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="card-body">
                  
                        <div class="row">
                           
                            <div class="col-md-12 table-responsive">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th style="vertical-align: middle; border-right: none;" colspan="2"> Paso a producción</th>
                                            <th style="vertical-align: middle; border-left: none;" colspan="2"> 
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <button wire:click.prevent="findAnimal()" class="btn btn-sm  btn-info" type="button">
                                                            <i class="fa fa-search"></i>
                                                        </button>
                                                    </div>
                                                    <input wire:model="input_search" wire:keydown.enter="findAnimal()" type="text" class="form-control" placeholder="Ingrese código">
                                                </div>
                                            </th>
                                        </tr>
                                    </thead>
                                   
                                    <tbody>
                                        <tr>
                                            <th colspan="4"> <b>1.- Datos del animal: </b></th>
                                        </tr>
                                        <tr>
                                            <td>Nombres <small class="text-danger">*</small></td>
                                            <td> <input readonly type="text" class="form-control" id="name" placeholder="" wire:model="name"></td>
                                            <td>Código <small class="text-danger">*</small></td>
                                            <td> <input readonly type="text" class="form-control" id="code" placeholder="" wire:model="code"></td>
                                        </tr>
                                       
                                        <tr>
                                            <td>Fecha de ingreso <small class="text-danger">*</small></td>
                                            <td> <input readonly type="text" class="form-control" id="dni" placeholder="" wire:model="start_date"></td>
                                            <td>Raza <small class="text-danger">*</small></td>
                                            <td> <input readonly type="text" class="form-control" id="no1" placeholder="" ></td>
                                        </tr>
                                        
                                        <tr>
                                            <td colspan="2">
                                                <div class="form-group">
                                                    <label>Estado </label>
                                                    <div class="switch switch-info d-inline m-r-10">
                                                        <input  wire:model="status"  type="checkbox" id="switch-i-1" checked>
                                                        <label for="switch-i-1" class="cr"></label>
                                                    </div>
                                                   
                                                </div>
                                                
                                            </td>
                                        </tr>
                                    </tbody>
                                   
                                </table>
                            </div>
                            <div class="col-md-12">
                                <ul>
                                    @error('estate_id')  <li><span class="text-danger">{{ $message }}</span></li>
                                    @enderror
                                    @error('animal_id')<li><span class="text-danger">{{ $message }}</span></li>
                                    @enderror
        
                                </ul>
                                
                            </div>
                        </div>
                
                       @if($action=='POST')
                        <button wire:click.prevent="store()" class="btn btn-primary"> Guadar </button>
                       @else
                       <button wire:click.prevent="update()" class="btn btn-success"> Actualizar </button>
                       @endif
                       
                        <button wire:click.prevent="resetInputs()" class="btn btn-danger"> Cancelar </button>
                   
                </div>
            </div>
        </div>
       
    </div>
</div>

