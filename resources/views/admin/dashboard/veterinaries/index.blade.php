@extends('admin.init.index')
@section('title')
    Veterinarios
@endsection
@section('content')
    <div class="pcoded-main-container">
        <div class="pcoded-content">
            <x-content title="Veterinarios" position="Lista de veterinarios"></x-content>
            <div class="row">
                @livewire('veterinaries')
            </div>
        </div>
    </div>
@endsection
