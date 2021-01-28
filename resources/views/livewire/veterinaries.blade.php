<div class="col-lg-12">
    @include('admin.modals.veterinaries.create')
    @include('admin.modals.veterinaries.edit')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-7">
                    <div class="form-group">
                        <input
                            wire:model="search"
                            class="form-control my-border"
                            type="text"
                            placeholder="Buscar...">
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <select wire:model="perPage" class="form-control text-gray-500 text-sm my-border">
                            <option value="5">5 por página</option>
                            <option value="10">10 por página</option>
                            <option value="15">15 por página</option>
                            <option value="20">20 por página</option>
                            <option value="50">50 por página</option>
                            <option value="100">100 por página</option>
                        </select>
                    </div>
                </div>
                <div class="col-2">
                    <div class="form-group">
                        @if($search !='')
                            <button wire:click="clear" class="btn btn-outline-danger ml-6">X</button>
                        @endif
                        @can('create_vets')
                            <button class="btn btn-success btn-sm btn-round has-ripple float-lg-right"
                                    data-toggle="modal" data-target="#createModal">
                                <i class="feather icon-plus"></i>
                                Agregar
                            </button>
                        @endcan
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card user-profile-list">
        <div class="card-body">
            @if(session()->has('message'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{session('message')}}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            <div class="dt-responsive table-responsive">
                <table id="user-list-table" class="table table-sm nowrap dataTable">
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
                            <td> 
                                <div class="d-inline-block align-middle">
                                    <img src="{{asset($veterinary->url_image)}}" alt="user image" class="img-radius align-top m-r-15" style="width:40px; height: 40px">
                                    <div class="d-inline-block">
                                        <h6 class="m-b-0">{{$veterinary->name}} {{$veterinary->last_name}}</h6>
                                        <p class="m-b-0">{{$veterinary->email}}</p>
                                    </div>
                                </div>
                            </td>
                            <td>{{$veterinary->dni}}</td>
                            <td>{{$veterinary->email}}</td>
                            <td>
                                <div class="d-inline-block align-middle">
                                    <div class="d-inline-block">
                                        <h6 class="m-b-0"> {{$veterinary->phone1}}</h6>
                                        <p class="m-b-0">{{$veterinary->phone2}} </p>
                                    </div>
                                </div>
                            </td>
                            <td>{{$veterinary->direction}}</td>
                            <td>{{$veterinary->created_at->format('Y-m-d')}}</td>
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
                                    @can('update_vets')
                                    <button
                                        class="btn btn-icon btn-warning"
                                        wire:click="edit({{ $veterinary->id }})"
                                        type="button"
                                        data-toggle="modal" data-target="#updateModal">
                                        <i class="feather icon-edit-2"></i></button>
                                    @endcan
                                    @can('destroy_vets')
                                    <button
                                        wire:click="delete({{ $veterinary->id }})"
                                        data-toggle="tooltip"
                                        title="Titulo"
                                        type="button"
                                        class="btn btn-icon btn-danger">
                                        <i class="feather icon-trash-2"></i>
                                    </button>
                                        @endcan
                                </div>
                            </td>
                        </tr>
                    @endforeach

                    </tbody>

                </table>
            </div>
            {{$veterinaries->links()}}
        </div>
    </div>
</div>
