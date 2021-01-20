@extends('admin.init.index')
@section('title')
    Enfermedades
@endsection
@section('content')
    <div class="pcoded-main-container">
        <div class="pcoded-content">
            <x-content title="Enfermedades" position="Lista de enfermedades"></x-content>
            <div class="row">
                @livewire('diseases')
            </div>
        </div>
    </div>
@endsection
