<div>
    
    @include('admin.modals.users.create')

    @include('admin.modals.users.edit')
    <br />

    <table  class="table nowrap dataTable">
        <thead>
            <tr>
                <th>Nombres</th>
                <th>Roles</th>
               
                <th>Registrado</th>
                <th>Estado</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr>
                    <td>
                        <div class="d-inline-block align-middle">
                            <img src="{{$user->url_image}}" alt="user image" class="img-radius align-top m-r-15" style="width:40px;">
                            <div class="d-inline-block">
                                <h6 class="m-b-0">{{$user->name}} {{$user->last_name}}</h6>
                                <p class="m-b-0">{{$user->email}}</p>
                            </div>
                        </div>
                    </td>
                    <td>
                       
                            @foreach($user->roles as $rol)

                            <span class="badge badge-info"> {{$rol->name}}</span> 
                            @endforeach
                       
                    </td>
                    
                    <td>{{$user->created_at}}</td>
                    <td>
                        @if ($user->status === 1)
                        <span
                           class="badge badge-success">
                           Activo
                        </span>
                        @else
                            <span
                                class="badge badge-danger">
                                Inactivo
                            </span>
                        @endif
                        <div class="overlay-edit">
                            <button 
                                class="btn btn-icon btn-warning" 
                                wire:click="edit({{ $user->id }})"
                                type="button" 
                                data-toggle="modal" data-target="#updateModal">
                                <i class="feather icon-edit-2"></i></button>
                                 
                            <button
                                wire:click="delete({{ $user->id }})"
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

