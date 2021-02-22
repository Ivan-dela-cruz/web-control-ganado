@extends('admin.init.index')
@section('title')
    Tareas de Empleados
@endsection
@section('content')
    <div class="pcoded-main-container">
        <div class="pcoded-content">
            <x-content title="Empleados" position="Tareas de empleados"></x-content>
            <div class="row">
                @livewire('employee-tasks')

            </div>
        </div>
    </div>
@endsection
