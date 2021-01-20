@extends('admin.init.index')
@section('title')
    Empleados
@endsection
@section('content')
    <div class="pcoded-main-container">
        <div class="pcoded-content">
            <x-content title="Empleados" position="Lista de empleados"></x-content>
            <div class="row">
                @livewire('employes')

            </div>
        </div>
    </div>
@endsection
