@extends('admin.init.index')
@section('title')
    Ventas
@endsection
@section('content')
    <div class="pcoded-main-container">
        <div class="pcoded-content">
            <x-content title="Ventas" position="Lista de Ventas"></x-content>
            <div class="row">
                @livewire('list-sales')
            </div>
        </div>
    </div>
@endsection
