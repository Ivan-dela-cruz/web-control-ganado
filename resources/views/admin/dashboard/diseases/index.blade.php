@extends('admin.init.index')
@section('title')
    Enfermedades
@endsection
@section('content')
    <div class="pcoded-main-container">
        <div class="pcoded-content">
            <x-content title="Enfermedades" position="Lista de enfermedades"></x-content>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card user-profile-list">
                        <div class="card-header">
                            <h5> Lista de enfermedades</h5>
                            <button class="btn btn-success btn-sm btn-round has-ripple float-lg-right"
                                 data-toggle="modal" data-target="#createModal">
                                <i class="feather icon-plus"></i>
                                Agregar
                            </button>
                        </div>
                        <div class="card-body">
                            <div class="dt-responsive table-responsive">
                                @livewire('diseases')
                            </div>
                        </div>
                    </div>
                </div>
            </div
        </div>
    </div>
@endsection