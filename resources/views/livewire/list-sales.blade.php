<div class="col-lg-12">
    @include('admin.modals.sales.details')

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                        <select id="estate" wire:model="estate_filter" class="form-control text-gray-500 text-sm my-border">
                            <option value="">Seleccionar Hacienda</option>
                            @foreach($estates as $estate)
                                <option value="{{$estate->id}}">{{$estate->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-sm-5">
                    <div class="form-group">
                        <input
                            wire:model="search"
                            class="form-control my-border"
                            type="text"
                            placeholder="Buscar...">
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group d-flex justify-content-between">
                        <select wire:model="perPage" class="form-control text-gray-500 text-sm my-border mr-4">
                            <option value="5">5 por página</option>
                            <option value="10">10 por página</option>
                            <option value="15">15 por página</option>
                            <option value="20">20 por página</option>
                            <option value="50">50 por página</option>
                            <option value="100">100 por página</option>
                        </select>
                        @if($search !='' || $estate_filter != '')
                            <button wire:click="clear" class="btn btn-outline-danger ">X</button>
                        @endif
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="card user-profile-list">
        <div class="card-body">
            <div class="dt-responsive table-responsive">
                <table  class="table table-sm nowrap dataTable">
                    <thead>
                    <tr>
                        <th>No°</th>
                        <th>Descripción</th>
                        <th>Fecha</th>
                        <th colspan="2">Total</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $count=1?>
                    @foreach($sales as $sale)
                        <tr>
                            <td>{{$count++}}</td>
                            <td>{{$sale->description}}</td>
                            <td>{{$sale->date}}</td>
                            <td>${{$sale->total}}</td>
                            <td>   <div class="overlay-edit">
                                    <button
                                        class="btn btn-icon btn-warning"
                                        wire:click="detailSale({{ $sale->id }})"
                                        type="button"
                                        title="Ver Detalle"
                                        data-toggle="modal" data-target="#detailsModal">
                                        <i class="feather icon-eye"></i></button>
                                </div></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{$sales->links()}}
            </div>
        </div>
    </div>
</div>
