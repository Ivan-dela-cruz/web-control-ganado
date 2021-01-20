@extends('admin.init.index')
@section('title')
    Companias
@endsection
@section('content')
    <div class="pcoded-main-container">
        <div class="pcoded-content">
            <x-content title="Companias" position="Lista de companias"></x-content>
            <div class="row">
                @livewire('companies')
            </div>
        </div>
    </div>
@endsection
