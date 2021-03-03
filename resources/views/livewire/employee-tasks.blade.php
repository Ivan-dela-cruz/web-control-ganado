<div class="col-lg-12">

    <div class="card">
        <div class="card-body">
            <ul class="nav nav-pills bg-nav-pills nav-justified mb-0">
                @canany(['create_task','update_task'])
                    <li class="nav-item" wire:click="setPos('new_task')">
                        <a href="#new_task" data-toggle="tab"
                           aria-expanded="{{$position == 'new_task'?true:false}}"
                           class="nav-link {{$position == 'new_task'?'active':''}}">
                            <i class="fas {{$header_task == 'Nueva Tarea' ? ' fa-plus-square' : 'fa-edit'}} f-18"></i>
                            <span class="d-none d-lg-inline-block m-l-10">{{$header_task}}</span>
                        </a>
                    </li>
                @endcanany
                <li class="nav-item" wire:click="setPos('list_task')">
                    <a href="#list_task" data-toggle="tab"
                       aria-expanded="{{$position == 'list_task'?true:false}}"
                       class="nav-link {{$position == 'list_task'?'active':''}}">
                        <i class="fas fa-file-alt f-18"></i>
                        <span class="d-none d-lg-inline-block m-l-10">Lista de Tareas</span>
                    </a>
                </li>

            </ul>
        </div>
    </div>

    <div class="tab-content">
        <div class="tab-pane {{$position == 'new_task'?'show active':''}}" id="new_task">
            <div class="row">
                <!-- customar project  start -->
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <select id="estate" wire:model="estate_id"
                                                class="form-control text-gray-500 text-sm my-border">
                                            <option value="">Seleccionar Hacienda</option>
                                            @foreach($estates as $estate)
                                                <option value="{{$estate->id}}">{{$estate->name}}</option>
                                            @endforeach
                                        </select>
                                        @error('estate_id')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-sm-9">
                                    <div class="d-flex justify-content-between">
                                        <div class="form-group w-100 mr-4">
                                            <select id="employee_id" wire:model="employee_id"
                                                    class="form-control text-gray-500 text-sm my-border">
                                                <option value=""></option>
                                                @foreach($employees as $employee)
                                                    <option value="{{$employee->id}}">
                                                        {{$employee->dni}}&nbsp;-&nbsp;{{$employee->name}}
                                                        &nbsp;{{$employee->last_name}}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('employee_id')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            @if($employee_id > 0|| $estate_id > 0)
                                                <button wire:click="clear" class="btn btn-outline-danger ">X</button>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-7">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <small class="text-primary" for="title">Título</small>
                                                <input type="text" id="name" class="form-control" placeholder=""
                                                       wire:model="title"/>
                                                @error('title')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <small class="text-primary" for="description">Descripcíon</small>
                                                <textarea name="description" class="form-control" id="" cols="30"
                                                          rows="5"
                                                          wire:model="description"></textarea>
                                                @error('description')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <small class="text-primary" for="date">Fecha</small>
                                                <input type="date" id="date" class="form-control" placeholder=""
                                                       wire:model="date"/>
                                                @error('date')<span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <small class="text-primary" for="hour">Hora</small>
                                                <input type="time" id="hour" class="form-control" placeholder=""
                                                       wire:model="hour"/>
                                                @error('hour')<span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <button wire:click="resetInputFields()"
                                                        class="btn btn-sm btn-danger float-right">
                                                    Cancelar
                                                </button>
                                                @if($header_task == 'Nueva Tarea')
                                                    @can('create_task')
                                                        <button wire:click="storeTask()"
                                                                class="btn btn-sm btn-primary float-right mr-2">
                                                            Agregar
                                                        </button>
                                                    @endcan
                                                @elseif($header_task == 'Editar Tarea')
                                                    @can('update_task')
                                                        <button wire:click="updateTask()"
                                                                class="btn btn-sm btn-primary float-right mr-2">
                                                            Actualizar
                                                        </button>
                                                    @endcan
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="card">
                                <div class="card-header">
                                    <h5>Tareas</h5>
                                    @if($employee_id > 0)
                                    <a class="btn btn-info btn-sm " target="blank" href="{{route('report-week-task',$employee_id)}}">Activadad de esta semana</a>
                               
                                    @endif
                                </div>
                               
                                    
                                <div class="card-body">
                                    <div class="new-task">
                                        @foreach($tasks as $task)
                                            <div class="to-do-list mb-4">
                                                <div class="checkbox-fade fade-in-primary">
                                                    <label
                                                        class="check-task  {{ $task->status == 'Finalizada' ? 'done-task' : '' }} ">
                                                        <input type="checkbox"
                                                               {{ $task->status == 'Finalizada' ? 'checked' : '' }} wire:click="taskCompleted({{$task->id}})">
                                                        <span class="cr mr-3">
                                            <i class="cr-icon fas fa-check txt-primary"></i>
                                        </span>
                                                        <span data-toggle="tooltip"
                                                              title="{{$task->description}}">{{\Illuminate\Support\Str::limit($task->title ,150) }}</span>
                                                    </label>
                                                </div>

                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- customar project  end -->
            </div>
        </div>

        <div class="tab-pane {{$position == 'list_task'?'show active':''}}" id="list_task">

            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-9">
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

                    </div>
                </div>
            </div>

            <div class="card user-profile-list ">
                
                <div class="card-body">
                    <div class="dt-responsive table-responsive">
                        <table id="user-list-table" class="table nowrap dataTable">
                            <thead>
                            <tr>
                                <th>Empleado</th>
                                <th>Hacienda</th>
                                <th>Título</th>
                                <th>Descripción</th>
                                <th>Fecha</th>
                                <th>Hora</th>
                                <th>Status</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($allTasks as $task)
                                <tr>
                                    <td>
                                        <div class="d-inline-block align-middle">
                                            <img src="{{asset($task->taskeable->url_image)}}" alt="user image"
                                                 class="img-radius align-top m-r-15" style="width:40px;">
                                            <div class="d-inline-block">
                                                <h6 class="m-b-0">{{$task->taskeable->name}}</h6>
                                                <p class="m-b-0">{{$task->taskeable->email}}</p>
                                            </div>
                                        </div>
                                    </td>
                                    @foreach($estates as$estate)
                                        @if($estate->id == $task->estate_id )
                                            <td>{{ $estate->name}}</td>
                                        @endif
                                    @endforeach
                                    <td>{{$task->title}}</td>
                                    <td><span data-toggle="tooltip"
                                              title="{{$task->description}}">{{\Illuminate\Support\Str::limit($task->description ,50) }}</span>
                                    </td>
                                    <td>{{$task->date}}</td>
                                    <td>{{$task->hour}}</td>
                                    <td>
                                        <span
                                            class="badge {{$task->status == 'Pendiente' ? 'badge-info' : 'badge-success'}} ">{{$task->status}}</span>

                                        <div class="overlay-edit">
                                            @can('update_task')
                                                <button type="button" class="btn btn-icon btn-warning"
                                                        wire:click="editTask({{$task->id}})"><i
                                                        class="feather icon-edit-2"></i></button>
                                            @endcan
                                            @can('destroy_task')
                                                <button type="button" class="btn btn-icon btn-danger"
                                                        wire:click="destroyTask({{$task->id}})"><i
                                                        class="feather icon-trash-2"></i></button>
                                            @endcan
                                        </div>
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                    {{$allTasks->links()}}
                </div>
            </div>
        </div>

    </div>


</div>


@section('scripts')
    <script>
        $('#employee_id').each(function () {
            $(this).select2({
                placeholder: "{{__('Seleccionar Empleado')}}",
                dropdownParent: $(this).parent()
            });
        });

        $('#employee_id').on('change', function (e) {
            var data = $(this).select2("val");
        @this.set('employee_id', data);
        });

        document.addEventListener("livewire:load", () => {
            Livewire.hook('message.processed', (message, component) => {
                $('#employee_id').each(function () {
                    $(this).select2({
                        placeholder: "{{__('Seleccionar Empleado')}}",
                        dropdownParent: $(this).parent()
                    });
                })
            });
        });
    </script>
@endsection

