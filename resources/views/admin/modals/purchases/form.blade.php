<div class="form-group">
    <label class="" for="description_dp">Descripción</label>
    <textarea wire:model="description_dp" class="form-control" rows="1" name="description_dp"></textarea>
    @error('description_dp')
    <span class="text-danger">{{ $message }}</span>
    @enderror
</div>

<div class="form-group">
    <label class="" for="quantity_dp">Cantidad</label>
    <input wire:model="quantity_dp" type="text" class="form-control", name="quantity_dp">
    @error('quantity_dp')
    <span class="text-danger">{{ $message }}</span>
    @enderror
</div>

<div class="form-group">
    <label class="" for="price_dp">Precio</label>
    <input wire:model="price_dp" type="text" class="form-control", name="price_dp">
    @error('price_dp')
    <span class="text-danger">{{ $message }}</span>
    @enderror
</div>
