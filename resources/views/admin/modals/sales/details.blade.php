
<div wire:ignore.self id="detailsModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="detailsModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content ">
            <div class="modal-header">
                <h5 class="modal-title" id="createModalLabel">Detalles de Compra</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true close-btn">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <small class="text-muted font-14">Hacienda:</small>
                        <h6>{{$estate}}</h6>
                        <small class="text-muted font-14">Descripción:</small>
                        <h6>{{$description}}</h6>
                    </div>
                    <div class="col-md-6">
                        <small class="text-muted font-14">Fecha:</small>
                        <h6>{{$date}}</h6>
                    </div>
                </div>
                <hr>

                <div class=" user-profile-list">
                    <div class="dt-responsive table-responsive">
                        <table class="table table-sm nowrap dataTable">
                            <thead>
                            <tr>
                                <th>Descripción</th>
                                <th>Cantidad</th>
                                <th>Precio</th>
                                <th>Total</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($sale_details as $detail)
                                <tr>
                                    <td>{{$detail->description}}</td>
                                    <td>{{$detail->quanity}}</td>
                                    <td>{{$detail->price_unit}}</td>
                                    <td>{{$detail->price_total}}</td>
                                </tr>
                            @endforeach
                            <tr>
                                <td colspan="2"></td>
                                <td><strong>TOTAL</strong></td>
                                <td class="f-16 bold text-success">${{$total}}</td>
                            </tr>
                            </tbody>

                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
