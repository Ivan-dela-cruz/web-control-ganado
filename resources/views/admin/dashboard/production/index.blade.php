@extends('admin.init.index')
@section('title')
    Animales de producción
@endsection
@section('content')
    <div class="pcoded-main-container">
        <div class="pcoded-content">
            <x-content title="Producción" position="Animales en producción"></x-content>
        
            @livewire('list-animal-production')
            
        </div>
    </div>
@endsection