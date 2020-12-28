<div>
    @include('admin.modals.estates.create')

    @include('admin.modals.estates.edit')
    <br />

    <table id="user-list-table" class="table nowrap dataTable">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>RUC</th>
                <th>Email</th>
                <th>Dirección</th>
                <th>Télefono</th>
                <th>Estado</th>
            </tr>
        </thead>
        <tbody>
            @foreach($estates as $estate)
                <tr>
                    <td>
                        <div class="d-inline-block align-middle">
                            <img src="{{$estate->url_image}}" alt="user image" class="img-radius align-top m-r-15" style="width:40px;">
                            <div class="d-inline-block">
                                <h6 class="m-b-0">{{$estate->name}}</h6>
                                
                            </div>
                        </div>
                    </td>
                    <td>{{$estate->ruc}}</td>
                    <td>{{$estate->email}}</td>
                    <td>{{$estate->address}}</td>
                    <td>{{$estate->phone}}</td>
                    <td>
                        @if ($estate->status === 1)
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
                                wire:click="edit({{ $estate->id }})"
                                type="button" 
                                data-toggle="modal" data-target="#updateModal">
                                <i class="feather icon-edit-2"></i></button>
                                 
                            <button
                                wire:click="delete({{ $estate->id }})"
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

