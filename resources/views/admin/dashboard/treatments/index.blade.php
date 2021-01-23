@extends('admin.init.index')
@section('title')
    Tratamientos
@endsection
@section('content')
    <div class="pcoded-main-container">
        <div class="pcoded-content">
            <x-content title="Tratamientos" position="Lista de tratamientos"></x-content>
            <div class="row">
                @livewire('treatments')
            </div>
        </div>
    </div>
@endsection
