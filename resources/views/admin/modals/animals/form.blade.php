<div class="row p-l-20 p-r-20">
    <div class="col-md-6 form-group">
        <small class="mr-3 text-primary">Nombre</small>
        <input type="text" id="exampleFormControlInput1" class="form-control" wire:model="name"/>
        @error('name')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="col-md-6 form-group">
        <small class="mr-3 text-primary">Código</small>
        <input type="text" id="exampleFormControlInput2" class="form-control"
               wire:model="code"/>
        @error('code')<span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="col-md-6 form-group">
        <small  class="text-primary">Imagen</small>
        <div class="input-group">
            <div class="input-group-prepend">
                @if($url_image == '')
                    <img wire:ignore src="{{asset('img/user.jpg')}}" alt="user image" class="img-radius align-top m-r-15" style="width:40px; height: 40px">
                @else
                    <img wire:ignore src="{{asset($url_image)}}" alt="user image" class="img-radius align-top m-r-15" style="width:40px; height: 40px;">
                @endif
            </div>
            <div class="custom-file">
                <input type="file" class="custom-file-input" id="inputGroupFile01" wire:model="url_image" accept="image/x-png,image/jpg,image/jpeg" >
                <label class="custom-file-label" for="inputGroupFile01" >Subir imagen</label>
            </div>
        </div>
        @error('url_image')<span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="col-md-6 form-group">
        <small class="mr-3 text-primary">Fecha de Nacimiento</small>
        <input type="date" id="exampleFormControlInput2" class="form-control" placeholder="Slug"
               wire:model="start_date"/>
        @error('start_date')<span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="col-md-6 form-group">
        <small class="mr-3 text-primary">Fecha de Salida</small>
        <input type="date" id="exampleFormControlInput2" class="form-control" placeholder="Slug" wire:model="end_date"/>
        @error('end_date')<span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="col-md-6 form-group">
        <small class="mr-3 text-primary">Hacienda</small>
        <select class="form-control" id="exampleFormControlInput3" wire:model="estate_id">
            <option value="">Seleccione</option>
            @foreach ($estates as $estate)
                <option value="{{ $estate->id }}">{{$estate->name}}</option>
            @endforeach
        </select>
        @error('estate_id')<span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="col-md-6 form-group">
        <small class="mr-3 text-primary">Estado</small>
        <div class="switch switch-info m-r-10">
            <input wire:model="status" type="checkbox" id="switch-i-1" checked>
            <label for="switch-i-1" class="cr"></label>
        </div>
        @error('status')<span class="text-danger mt-2">{{ $message }}</span>
        @enderror
    </div>
</div>
