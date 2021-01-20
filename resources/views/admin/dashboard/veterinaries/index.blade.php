@extends('admin.init.index')
@section('title')
    Estudiantes
@endsection
@section('content')
    <div class="pcoded-main-container">
        <div class="pcoded-content">
            <x-content title="Veterinarias" position="Lista de veterinarios"></x-content>
            <div class="row">
                @livewire('veterinaries')
            </div>
        </div>
    </div>
@endsection
