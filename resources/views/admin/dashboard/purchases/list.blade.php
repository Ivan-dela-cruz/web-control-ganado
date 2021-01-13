@extends('admin.init.index')
@section('title')
    Compras
@endsection
@section('content')
    <div class="pcoded-main-container">
        <div class="pcoded-content">
            <x-content title="Compras" position="Lista de compras"></x-content>
            <div class="row">
                @livewire('list-purchases')
            </div>
        </div>
    </div>
@endsection
