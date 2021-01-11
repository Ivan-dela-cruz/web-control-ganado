@extends('admin.init.index')
@section('title')
    Animales de producción
@endsection
@section('content')
    <div class="pcoded-main-container">
        <div class="pcoded-content">
            <x-content title="Registros" position="Formulario"></x-content>
        
            @livewire('animal-production')
            
        </div>
    </div>
@endsection