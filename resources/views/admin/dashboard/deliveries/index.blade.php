@extends('admin.init.index')
@section('title')
    Entregas
@endsection
@section('content')
    <div class="pcoded-main-container">
        <div class="pcoded-content">
            <x-content title="Entregas" position="Enntregas de leche"></x-content>
            <div class="row">
                @livewire('deliveries')
            </div>
        </div>
    </div>
@endsection
