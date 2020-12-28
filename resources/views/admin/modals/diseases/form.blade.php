<div class="form-group">
    <label for="exampleFormControlInput1">Nombre</label>
    <input type="text" id="exampleFormControlInput1" class="form-control"  placeholder="" wire:model="name" />
    @error('name')
    <span class="text-danger">{{ $message }}</span>
    @enderror
</div>
<div class="form-group">
    <label for="exampleFormControlInput2">Descripciòn</label>
    <input type="text" id="exampleFormControlInput2" class="form-control" placeholder="" wire:model="description" />
    @error('description')<span class="text-danger">{{ $message }}</span>
    @enderror
</div>
<div class="form-group">
    <label for="exampleFormControlInput2">Tiempo de enfermedad</label>
    <input type="text" id="exampleFormControlInput2" class="form-control" placeholder="" wire:model="time_diseases" />
    @error('time_diseases')<span class="text-danger">{{ $message }}</span>
    @enderror
</div>

<div class="form-group">
    <label for="exampleFormControlInput3">Estado</label>
    <select class="form-control" id="exampleFormControlInput3" wire:model="status">
        <option value="">Seleccionar</option>
        <option value="1">Activo</option>
        <option value="0">Inactivo</option>
    </select>
    @error('status')<span class="text-danger">{{ $message }}</span>
    @enderror
</div>

$table->unsignedBigInteger('animal_production_id');
$table->unsignedBigInteger('treatment_id');
$table->string('tipe_mastitis')->nullable();
$table->string('description')->nullable();
$table->string('level')->nullable();
$table->boolean('status')->nullable()->default(true);
$table->softDeletes();
$table->timestamps();
$table->foreign('treatment_id')->references('id')->on('treatments');
$table->foreign('animal_production_id')->references('id')->on('animal_production');