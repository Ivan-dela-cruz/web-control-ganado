@extends('admin.init.index')
@section('title')
    Animales
@endsection
@section('content')
    <div class="pcoded-main-container">
        <div class="pcoded-content">
            <x-content title="Animales" position="Lista de Animales"></x-content>
            <div class="row">
                @livewire('animals')
            </div>
        </div>
    </div>
@endsection
