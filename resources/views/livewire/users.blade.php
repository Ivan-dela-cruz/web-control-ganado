<div class="col-lg-12">
    @include('admin.modals.users.'.$view)

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-7">
                    <div class="form-group">
                        <input
                            wire:model="search"
                            class="form-control my-border"
                            type="text"
                            placeholder="Buscar...">
                    </div>
                </div>
                <div class="col-sm-3">
                        <div class="form-group d-flex justify-content-between">
                            <select wire:model="perPage" class="form-control text-gray-500 text-sm my-border mr-4">
                                <option value="5">5 por página</option>
                                <option value="10">10 por página</option>
                                <option value="15">15 por página</option>
                                <option value="20">20 por página</option>
                                <option value="50">50 por página</option>
                                <option value="100">100 por página</option>
                            </select>
                            @if($search !='')
                                <button wire:click="clear" class="btn btn-outline-danger ">X</button>
                            @endif
                        </div>
                </div>
                <div class="col-sm-2">
                    <div class="form-group">
                        @can('create_user')
                            <button class="btn btn-success btn-sm btn-round has-ripple float-lg-right"
                                    wire:click="create()">
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
                <table  class="table nowrap dataTable">
                    <thead>
                    <tr>
                        <th>Nombres</th>
                        <th>Teléfono</th>
                        <th>Dirección</th>
                        <th>Rol</th>
                        <th>Registrado</th>
                        <th>Estado</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>
                                <div class="d-inline-block align-middle">
                                    <img src="{{asset($user->url_image)}}" alt="user image" class="img-radius align-top m-r-15" style="width:40px; height: 40px">
                                    <div class="d-inline-block">
                                        <h6 class="m-b-0">{{$user->name}} {{$user->last_name}}</h6>
                                        <p class="m-b-0">{{$user->email}}</p>
                                    </div>
                                </div>
                            </td>
                            <td>{{$user->phone}}</td>
                            <td>{{$user->address}}</td>
                            <td>
                                @foreach($user->roles as $rol)
                                    <span class="badge badge-info"> {{$rol->name}}</span>
                                @endforeach

                            </td>

                            <td>{{$user->created_at->format('Y-m-d')}}</td>
                            <td>
                                <span class="{{$user->status ==1 ? "badge badge-success":"badge badge-danger"}}">
                                    {{$user->status ==1 ? "Activo":"Inactivo"}}
                                </span>
                                <div class="overlay-edit">
                                    @if($user->status == 0)
                                        @can('update_user')
                                            <button
                                                class="btn btn-icon btn-success"
                                                wire:click="activate({{ $user->id }})"
                                                type="button">
                                                <i class="feather icon-unlock"></i></button>
                                        @endcan
                                    @else
                                    @can('update_user')
                                    <button
                                        class="btn btn-icon btn-warning"
                                        wire:click="edit({{ $user->id }})"
                                        type="button">
                                        <i class="feather icon-edit-2"></i></button>
                                    @endcan
                                    @can('destroy_user')
                                    <button
                                        wire:click="delete({{ $user->id }})"
                                        data-toggle="tooltip"
                                        title="Titulo"
                                        type="button"
                                        class="btn btn-icon btn-danger">
                                        <i class="feather icon-trash-2"></i>
                                    </button>
                                        @endcan
                                        @endif
                                </div>
                            </td>
                        </tr>
                    @endforeach

                    </tbody>

                </table>
            </div>
            {{$users->links()}}
        </div>
    </div>

    @section('scripts')
        <script>
            $('#role').each(function () {
                $(this).select2({
                    placeholder: "{{__('Seleccione...')}}",
                    dropdownParent: $(this).parent()
                });
            });
            $('#role').on('change', function (e) {
                var data = $(this).select2("val");
            @this.set('roles_selected', data);
            });
            document.addEventListener("livewire:load", () => {
                Livewire.hook('message.processed', (message, component) => {
                    $('#role').each(function () {
                        $(this).select2({dropdownParent: $(this).parent()});
                    })
                });
            });

        </script>
    @endsection
</div>



