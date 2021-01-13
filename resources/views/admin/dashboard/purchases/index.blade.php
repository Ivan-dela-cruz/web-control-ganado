@extends('admin.init.index')
@section('title')
    Compras
@endsection
@section('content')
    <div class="pcoded-main-container">
        <div class="pcoded-content">
            <x-content title="Compras" position="Nueva Compra"></x-content>
            <div class="row">
                @livewire('purchases')
            </div>
        </div>
    </div>
@endsection
