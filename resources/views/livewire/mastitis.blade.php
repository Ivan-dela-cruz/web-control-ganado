<div>
        @if(session()->has('message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{session('message')}}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        @include('admin.modals.mastitis.create')
    
        @include('admin.modals.mastitis.edit')
        <br />
        <table class="table  nowrap mb-2 dataTable">
            <thead>
                <tr>
                    <th>Tipo</th>
                    <th>Descripcion</th>
                    <th>Level</th>
                    <th>Tratamiento</th>
                    <th>Nombre de Animal</th>
                    <th>Registrado</th>
                    <th>Estado</th>
                </tr>
            </thead>
            <tbody>
                @foreach($mastitiss as $data)
                <tr>	
                    <td>{{ $data->tipe_mastitis }}</td>
                    <td>{{ $data->description }}</td>
                    <td>{{ $data->level }}</td>
            
                    <td>{{ $data->treatment->name}}</td>
                    <td>{{ $data->created_at }}</td>
                    <td>
                        @if ($data->status === 1)
                             <span
                                class="badge badge-light-success">
                                Activo
                             </span>
                        @else
                            <span
                                class="badge badge-light-danger">
                                Inactivo
                             </span>
                            
                        @endif
                     
                        <div class="overlay-edit">
                            <button 
                                class="btn btn-icon btn-warning" 
                                wire:click="edit({{ $data->id }})"
                                type="button" 
                                data-toggle="modal" data-target="#updateModal">
                                <i class="feather icon-edit-2"></i></button>
                                 
                            <button
                                wire:click="delete({{ $data->id }})"
                                data-toggle="tooltip" 
                                title="Titulo"
                                type="button"
                                class="btn btn-icon btn-danger">
                                <i class="feather icon-trash-2"></i>
                            </button>
                        </div>
                        
                    </td>
                </tr>
                @endforeach
            </tbody>
    
        </table>
    
</div>
