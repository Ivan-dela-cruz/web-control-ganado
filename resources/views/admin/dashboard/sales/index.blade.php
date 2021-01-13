@extends('admin.init.index')
@section('title')
    Ventas
@endsection
@section('content')
    <div class="pcoded-main-container">
        <div class="pcoded-content">
            <x-content title="Ventas" position="Nueva Venta"></x-content>
            <div class="row">
                @livewire('sales')
            </div>
        </div>
    </div>
@endsection

