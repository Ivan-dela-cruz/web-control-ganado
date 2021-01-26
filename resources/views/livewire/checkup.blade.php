<div class="col-lg-12">

    @include('admin.modals.checkpus.'.$view)

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-3">
                    <div class="form-group">
                        <select id="estate" wire:model="estate_filter"
                                class="form-control text-gray-500 text-sm my-border">
                            <option value="">Seleccionar Hacienda</option>
                            @foreach($estates as $estate)
                                <option value="{{$estate->id}}">{{$estate->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-sm-4">
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
                        @if($search !='' || $estate_filter != '')
                            <button wire:click="clear" class="btn btn-outline-danger ">X</button>
                        @endif
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="form-group">

                        <button class="btn btn-success btn-sm btn-round has-ripple float-lg-right"
                                wire:click="create()">
                            <i class="feather icon-plus"></i>
                            Agregar
                        </button>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card user-profile-list">
        <div class="card-body">
            <div class="dt-responsive table-responsive">
                <table class="table table-sm  nowrap mb-2 dataTable">
                    <thead>
                    <tr>
                        <th>Hacienda</th>
                        <th>[Código]&nbsp;Animal</th>
                        <th>Motivo</th>
                        <th>Descripción</th>
                        <th>Fecha</th>
                        <th>Registrado</th>
                        <th>Estado</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($checkupslist as $data)
                        <tr>
                            <td>{{ $data->estate->name}}</td>
                            @foreach($animals as $a)
                                @if($data->animal_id == $a->id)
                                    <td>{{"[".$a->code."]"}}&nbsp;{{$a->name}}</td>
                                    @endif
                            @endforeach
                            <td>{{ $data->topic }}</td>
                            <td>{{ $data->description }}</td>
                            <td>{{ $data->date }}</td>

                            <td>{{ $data->created_at }}</td>

                            <td>
                                @if ($data->status === 1)
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
                                    @can('update_animal')
                                        <button
                                            class="btn btn-icon btn-warning"
                                            wire:click="edit({{ $data->id }})"
                                            type="button">
                                            <i class="feather icon-edit-2"></i></button>
                                    @endcan
                                    @can('destroy_animal')
                                        <button
                                            wire:click="delete({{ $data->id }})"
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
            {{$checkupslist->links()}}
        </div>
    </div>
</div>

@section('scripts')
    <script>
        $('#animal_id').each(function () {
            $(this).select2({
                placeholder: "{{__('Seleccione...')}}",
                dropdownParent: $(this).parent()
            });
        });

        $('#animal_id').on('change', function (e) {
            var data = $(this).select2("val");
        @this.set('animal_id', data);
        });

        document.addEventListener("livewire:load", () => {
            Livewire.hook('message.processed', (message, component) => {
                $('#animal_id').each(function () {
                    $(this).select2({dropdownParent: $(this).parent()});
                })
            });
        });
    </script>
    @endsection
