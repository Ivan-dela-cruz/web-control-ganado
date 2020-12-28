<div>
    @if(session()->has('message'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>{{session('message')}}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
@include('admin.modals.veterinaries.create')

@include('admin.modals.veterinaries.edit')
<br />
<table id="user-list-table" class="table nowrap">
    <thead>
        <tr>
            <th>Nombre Completo</th>
            <th>Dni</th>
            <th>Email</th>
            <th>Telèfonos</th>
            <th>Direcciòn</th>
            <th>Registrado</th>
            <th>Estado</th>
        </tr>
    </thead>
    <tbody>
        @foreach($veterinaries as $veterinary)
            <tr>
                <td>{{$veterinary->name}} {{$veterinary->last_name}}</td>
                <td>{{$veterinary->dni}}</td>
                <td>{{$veterinary->email}}</td>
                <td>{{$veterinary->phone1}} - {{$veterinary->phone2}} </td>
                <td>{{$veterinary->direction}}</td>
                <td>{{$veterinary->created_at}}</td>
                <td>
                    @if ($veterinary->status === 1)
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
                            wire:click="edit({{ $veterinary->id }})"
                            type="button" 
                            data-toggle="modal" data-target="#updateModal">
                            <i class="feather icon-edit-2"></i></button>
                             
                        <button
                            wire:click="delete({{ $veterinary->id }})"
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
