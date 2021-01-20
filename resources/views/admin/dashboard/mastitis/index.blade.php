@extends('admin.init.index')
@section('title')
    Mastitis
@endsection
@section('content')
    <div class="pcoded-main-container">
        <div class="pcoded-content">
            <x-content title="Mastitis" position="Lista de Mastitis"></x-content>
            <div class="row">
                @livewire('mastitis')
            </div>
        </div>
    </div>
@endsection
