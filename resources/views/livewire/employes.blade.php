<div>
    @include('admin.modals.employes.create')

    @include('admin.modals.employes.edit')
    <br />

    <table id="user-list-table" class="table nowrap">
        <thead>
            <tr>
                <th>Nombres</th>
                <th>DNI</th>
                <th>Email</th>
                <th>Usuario</th>
                <th>Registrado</th>
                <th>Estado</th>
            </tr>
        </thead>
        <tbody>
            @foreach($employes as $employe)
                <tr>
                    <td>
                        <div class="d-inline-block align-middle">
                            <img src="{{$employe->url_image}}" alt="user image" class="img-radius align-top m-r-15" style="width:40px;">
                            <div class="d-inline-block">
                                <h6 class="m-b-0">{{$employe->name}} {{$employe->last_name}}</h6>
                                <p class="m-b-0">{{$employe->email}}</p>
                            </div>
                        </div>
                    </td>
                    <td>{{$employe->dni}}</td>
                    <td>{{$employe->email}}</td>
                    <td>{{$employe->user->name}}</td>
                    <td>{{$employe->created_at}}</td>
                    <td>
                        @if ($employe->status === 1)
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
                                wire:click="edit({{ $employe->id }})"
                                type="button" 
                                data-toggle="modal" data-target="#updateModal">
                                <i class="feather icon-edit-2"></i></button>
                                 
                            <button
                                wire:click="delete({{ $employe->id }})"
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
