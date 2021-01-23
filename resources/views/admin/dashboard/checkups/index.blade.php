@extends('admin.init.index')
@section('title')
    Chequeo Médico
@endsection
@section('content')
    <div class="pcoded-main-container">
        <div class="pcoded-content">
            <x-content title="Chequeos" position="Lista de chequeos"></x-content>
            <div class="row">
                @livewire('checkup')
            </div>
        </div>
    </div>
@endsection
