<div>
    @if(session()->has('message'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>{{session('message')}}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
@include('admin.modals.treatments.create')

@include('admin.modals.treatments.edit')
<br />

<table id="user-list-table" class="table nowrap">
    <thead>
        <tr>
            <th>Nombres</th>
            <th>Descripcion</th>
            <th>Registrado</th>
            <th>Estado</th>
        </tr>
    </thead>
    <tbody>
        @foreach($treatments as $treatment)
            <tr>
                <td>{{$treatment->name}}</td>
                <td>{{$treatment->description}}</td>
                <td>{{$treatment->created_at}}</td>
                <td>
                    @if ($treatment->status === 1)
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
                            wire:click="edit({{ $treatment->id }})"
                            type="button" 
                            data-toggle="modal" data-target="#updateModal">
                            <i class="feather icon-edit-2"></i></button>
                             
                        <button
                            wire:click="delete({{ $treatment->id }})"
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
