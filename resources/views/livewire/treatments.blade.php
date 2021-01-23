<div class="col-lg-12">
    @include('admin.modals.treatments.create')

    @include('admin.modals.treatments.edit')
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
                        @can('create_treatment')
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
            <div class="dt-responsive table-responsive">
                <table id="user-list-table" class="table table-sm nowrap dataTable">
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
                            <td>{{$treatment->created_at->format('Y-m-d')}}</td>
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
                                    @can('update_treatment')
                                        <button
                                            class="btn btn-icon btn-warning"
                                            wire:click="edit({{ $treatment->id }})"
                                            type="button"
                                            data-toggle="modal" data-target="#updateModal">
                                            <i class="feather icon-edit-2"></i></button>
                                    @endcan
                                    @can('destroy_treatment')
                                        <button
                                            wire:click="delete({{ $treatment->id }})"
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
            {{$treatments->links()}}
        </div>
    </div>
</div>

