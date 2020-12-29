<div>
    @include('admin.modals.companies.create')

    @include('admin.modals.companies.edit')
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
            @foreach($companies as $company)
                <tr>
                    <td>
                        <div class="d-inline-block align-middle">
                            <img src="{{$company->url_image}}" alt="user image" class="img-radius align-top m-r-15" style="width:40px;">
                            <div class="d-inline-block">
                                <h6 class="m-b-0">{{$company->name}}</h6>
                                
                            </div>
                        </div>
                    </td>
                    <td>{{$company->ruc}}</td>
                    <td>{{$company->email}}</td>
                    <td>{{$company->address}}</td>
                    <td>{{$company->phone}}</td>
                    <td>
                        @if ($company->status === 1)
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
                                wire:click="edit({{ $company->id }})"
                                type="button" 
                                data-toggle="modal" data-target="#updateModal">
                                <i class="feather icon-edit-2"></i></button>
                                 
                            <button
                                wire:click="delete({{ $company->id }})"
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

