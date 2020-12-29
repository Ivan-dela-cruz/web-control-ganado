<div>
    @if(session()->has('message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{session('message')}}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    @include('admin.modals.deliveries.create')

    @include('admin.modals.deliveries.edit')
    <br />

    <table id="user-list-table" class="table nowrap">
        <thead>
            <tr>
                <th>Hacienda</th>
                <th>Companía</th>
                <th>Hora</th>
                <th>Fecha</th>
                <th>Total entregado</th>
                <th>Estado</th>
            </tr>
        </thead>
        <tbody>
            @foreach($deliveries as $delivery)
                <tr>
                    <td>{{$delivery->estate->name}}</td>
                    <td>{{$delivery->company->name}}</td>
                    <td>{{$delivery->hour}}</td>
                    <td>{{$delivery->date}}</td>
                    <td>{{$delivery->total_liters}}</td>
                    <td>
                        @if ($delivery->status === 1)
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
                                wire:click="edit({{ $delivery->id }})"
                                type="button" 
                                data-toggle="modal" data-target="#updateModal">
                                <i class="feather icon-edit-2"></i></button>
                                 
                            <button
                                wire:click="delete({{ $delivery->id }})"
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

