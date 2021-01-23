
    <div class="form-group">
        <label for="exampleFormControlInput1">Nombre</label>
        <input type="text" id="exampleFormControlInput1" class="form-control"  placeholder="Enter First Name" wire:model="name" />
        @error('name')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput2">Descripcion</label>
        <input type="text" id="exampleFormControlInput2" class="form-control" placeholder="Enter Last Name" wire:model="description" />
        @error('description')<span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
     <div class="form-group">
        <label for="exampleFormControlInput2">Slug</label>
        <input type="text" id="exampleFormControlInput2" class="form-control" placeholder="Enter Last Name" wire:model="slug" />
        @error('slug')<span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput3">Estado</label>
        <select class="form-control" id="exampleFormControlInput3" wire:model="status">
            <option value="">Select</option>
            <option value="1">Activo</option>
            <option value="0">Inactivo</option>
        </select>
        @error('status')<span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <button wire:click.prevent="store()" class="btn btn-success">Save</button>
    <button type="button" class="btn btn-secondary close-btn" data-dismiss="modal">Close</button>
