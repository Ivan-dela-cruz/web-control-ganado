<div class="col-sm-12">
    @include('admin.modals.purchases.create')
    @include('admin.modals.purchases.edit')

    <div class="card ">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-5">
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Hacienda</label>
                        <select class="form-control" name="estate_id" wire:model.lazy="estate_id">
                            <option value="">Seleccione</option>
                            @foreach($estates as $estate)
                                <option value="{{$estate->id}}">{{$estate->name}}</option>
                            @endforeach
                        </select>
                        @error('estate_id')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-sm-5">
                    <div class="form-group">
                        <label class="" for="description">Descripción</label>
                        <textarea wire:model.lazy="description" class="form-control" rows="1"
                                  name="description"></textarea>
                        @error('description')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="form-group">
                        <center>
                            <button wire:ignore id="btnNewPurchase" wire:click="purchase_store()"
                                    class=" btn btn-sm btn-success w-100 mb-2"><i
                                    class="feather icon-shopping-cart"></i> Comprar
                            </button>
                            <button wire:ignore id="btnUpPurchase" wire:click="purchase_update()"
                                    class=" btn btn-sm btn-secondary w-100 mb-2 d-none"><i
                                    class="feather icon-shopping-cart"></i> Actualizar
                            </button>
                            <button wire:ignore id="addItemPurchase" class=" btn btn-sm btn-info w-100"
                                    data-toggle="modal" data-target="#createModal" disabled><i
                                    class="feather icon-plus"></i>Agregar
                            </button>
                        </center>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="card user-profile-list">
        <div class="card-body ">
            @if($items->count()>0)
                <div class="row col-sm-2 float-right mb-2">
                    <button wire:click="endPurchase()" class="btn btn-sm btn-danger w-100 "><i
                            class="feather icon-check-circle"></i> Finalizar
                    </button>
                </div>
            @endif
            <div class="dt-responsive table-responsive">
                <table class="table nowrap dataTable">
                    <thead>
                    <tr>
                        <th>No°</th>
                        <th>Descripción</th>
                        <th>Cantidad</th>
                        <th>Precio</th>
                        <th>Total</th>
                        <th>&nbsp;</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $count = 1?>
                    @foreach($items as $item)
                        <tr>
                            <td>{{$count++}}</td>
                            <td>{{$item->description}}</td>
                            <td>{{$item->quanity}}</td>
                            <td>{{$item->price_unit}}</td>
                            <td>{{$item->price_total}}</td>
                            <td>&nbsp;
                                <div class="overlay-edit">
                                    <button
                                        class="btn  btn-icon btn-warning"
                                        wire:click="editItem({{ $item->id }})"
                                        type="button"
                                        title="Editar"
                                        data-toggle="modal" data-target="#updateModal">
                                        <i class="feather icon-edit-2"></i></button>

                                    <button
                                        wire:click="deleteItem({{ $item->id }})"
                                        data-toggle="tooltip"
                                        title="Quitar"
                                        type="button"
                                        class="btn  btn-icon btn-danger">
                                        <i class="feather icon-trash-2"></i>
                                    </button>
                                </div>
                            </td>

                        </tr>
                    @endforeach

                    </tbody>

                </table>
            </div>

        </div>
    </div>
</div>
