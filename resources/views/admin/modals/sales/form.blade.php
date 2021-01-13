<div class="form-group">
    <label class="" for="description_ds">Descripción</label>
    <textarea wire:model="description_ds" class="form-control" rows="1" name="description_ds"></textarea>
    @error('description_ds')
    <span class="text-danger">{{ $message }}</span>
    @enderror
</div>

<div class="form-group">
    <label class="" for="quantity_ds">Cantidad</label>
    <input wire:model="quantity_ds" type="text" class="form-control", name="quantity_ds">
    @error('quantity_ds')
    <span class="text-danger">{{ $message }}</span>
    @enderror
</div>

<div class="form-group">
    <label class="" for="price_ds">Precio</label>
    <input wire:model="price_ds" type="text" class="form-control", name="price_ds">
    @error('price_ds')
    <span class="text-danger">{{ $message }}</span>
    @enderror
</div>
