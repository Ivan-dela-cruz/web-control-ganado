@extends('admin.init.index')
@section('title')
    Entregas
@endsection
@section('content')
    <div class="pcoded-main-container">
        <div class="pcoded-content">
            <x-content title="Entregas" position="Enntregas de leche"></x-content>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card user-profile-list">
                        <div class="card-header">
                            <h5> Lista de entregas</h5>
                            <button class="btn btn-success btn-sm btn-round has-ripple float-lg-right"
                                 data-toggle="modal" data-target="#createModal">
                                <i class="feather icon-plus"></i>
                                Agregar
                            </button>
                        </div>
                        <div class="card-body">
                            <div class="dt-responsive table-responsive">
                                @livewire('deliveries')
                            </div>
                        </div>
                    </div>
                </div>
            </div
        </div>
    </div>
@endsection