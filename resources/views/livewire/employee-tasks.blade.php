<div class="col-lg-12">


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
                                        {{$employee->dni}}&nbsp;-&nbsp;{{$employee->name}}&nbsp;{{$employee->last_name}}
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
                                <input type="text" id="name" class="form-control" placeholder="" wire:model="title"/>
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
                                <textarea name="description" class="form-control" id="" cols="30" rows="5"
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
                                <input type="date" id="date" class="form-control" placeholder="" wire:model="date"/>
                                @error('date')<span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <small class="text-primary" for="hour">Hora</small>
                                <input type="time" id="hour" class="form-control" placeholder="" wire:model="hour"/>
                                @error('hour')<span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-12">
                            <div class="form-group">
                                <button wire:click="resetInputFields()" class="btn btn-sm btn-danger float-right">
                                    Cancelar
                                </button>
                                <button wire:click="storeTask()" class="btn btn-sm btn-primary float-right mr-2">
                                    Agregar
                                </button>
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
                </div>
                <div class="card-body">
                    <div class="new-task">
                        @foreach($tasks as $task)
                        <div class="to-do-list mb-4">
                            <div class="checkbox-fade fade-in-primary">
                                <label class="check-task  {{ $task->status == 'Finalizada' ? 'done-task' : '' }} ">
                                    <input type="checkbox" {{ $task->status == 'Finalizada' ? 'checked' : '' }} wire:click="taskCompleted({{$task->id}})">
                                    <span class="cr mr-3">
                                            <i class="cr-icon fas fa-check txt-primary"></i>
                                        </span>
                                    <span>{{$task->description}}</span>
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

