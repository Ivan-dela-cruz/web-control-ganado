@extends('admin.init.index')
@section('title')
    Haciendas
@endsection
@section('content')
    <div class="pcoded-main-container">
        <div class="pcoded-content">
            <x-content title="Haciendas" position="Lista de haciendas"></x-content>
            <div class="row">
                @livewire('estates')
            </div>
        </div>
    </div>
@endsection
