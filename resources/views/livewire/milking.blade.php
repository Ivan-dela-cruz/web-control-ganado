<div class="col-lg-12">
    
   
    <div class="col-xl-12 col-lg-12 filter-bar">
        
            <nav class="navbar m-b-30 p-10">
                <ul class="nav">
                    <li class="nav-item f-text active">
                        <a class="nav-link text-secondary" href="javascript: void(0);">Filtrar por: <span
                                class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-secondary" href="javascript: void(0);"
                        id="bydate" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i
                                class="far fa-clock"></i> Fechas</a>
                        <div class="dropdown-menu" aria-labelledby="bydate">
                            <a wire:click="getTime('')" class="dropdown-item {{$timeWhere == '' ? 'active': ''}}" href="javascript: void(0);">Ver todos</a>
                            <div class="dropdown-divider"></div>
                            <a wire:click="getTime('day')" class="dropdown-item {{$timeWhere == 'day' ? 'active': ''}}" href="javascript: void(0);">Hoy</a>
                            <a wire:click="getTime('yesterday')" class="dropdown-item {{$timeWhere == 'yesterday' ? 'active': ''}}" href="javascript: void(0);">Ayer</a>
                            <a wire:click="getTime('week')" class="dropdown-item {{$timeWhere == 'week' ? 'active': ''}}" href="javascript: void(0);">Esta semana</a>
                            <a wire:click="getTime('month')" class="dropdown-item {{$timeWhere == 'month' ? 'active': ''}}" href="javascript: void(0);">Este mes</a>
                            <a wire:click="getTime('year')" class="dropdown-item {{$timeWhere == 'year' ? 'active': ''}}" href="javascript: void(0);">Este año</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <input
                        wire:model="search"
                        class="form-control my-border"
                        type="text"
                        placeholder="Buscar...">
                    </li>
                    <li class="nav-item dropdown">
                        <select id="estate" wire:model="estate_filter"
                                class="form-control text-gray-500 text-sm my-border">
                            <option value="">Seleccionar Hacienda</option>
                            @foreach($estates as $estate)
                                <option value="{{$estate->id}}">{{$estate->name}}</option>
                            @endforeach
                        </select>
                    </li>
                   
                    <li class="nav-item dropdown">
                        <select wire:model="perPage" class="form-control text-gray-500 text-sm my-border mr-4">
                            <option value="5">5 por página</option>
                            <option value="10">10 por página</option>
                            <option value="15">15 por página</option>
                            <option value="20">20 por página</option>
                            <option value="50">50 por página</option>
                            <option value="100">100 por página</option>
                        </select>
                        
                    </li>
                    <li class="nav-item dropdown">
                        @if($search !='' || $estate_filter != '')
                            <button wire:click="clear" class="btn btn-outline-danger ">X</button>
                        @endif
                    </li>
                    
                </ul>
            </nav>
    </div>
           
 
    <div class="card user-profile-list">
        <div class="card-body">
            <div class="dt-responsive table-responsive">
                <table class="table table-sm  nowrap mb-2 dataTable">
                    <thead>
                    <tr>
                      
                        <th>Fecha</th>
                        <th>Tipo</th>
                        <th>Total litros</th>
                        <th>Descripción</th>
                      
                    </tr>
                    </thead>
                    <tbody>
                        <p hidden>{{ \Carbon\Carbon::setLocale('es') }}</p>
                    @foreach($incomes as $data)
                        <tr  wire:click="dataId({{$data->id}})" >
                            <td>{{ \Carbon\Carbon::parse($data->date)->isoFormat('LL') }}</td>
                            <td>{{ $data->time_milking }}</td>
                            <td>{{ $data->total_liters }}</td>
                            <td>
                                @if($data->description == "")
                                -N/A-
                                @else
                                {{ $data->description }}
                                @endif
                                
                            </td>
                        </tr>
                    @endforeach
                    </tbody>

                </table>
            </div>
            {{$incomes->links()}}
        </div>
    </div>
    @if(!is_null($income))
    <div class="card user-profile-list">
        <div class="card-header">
                <h5>{{ \Carbon\Carbon::parse($income->date)->isoFormat('LL') }}  </h5>
                <span class="float-right">Total litros (<b>{{$income->total_liters}}</b>)</span>
                <a class="btn btn-success btn-md" target="blank" href="{{route('report-income',$income->id)}}">Imprimir</a>
        </div>
        <div class="card-body">
            <div class="dt-responsive table-responsive">
                <table class="table table-sm  nowrap mb-2 dataTable">
                    <thead>
                    <tr>
                        <th>Animal</th>
                        <th>Fecha</th>
                        <th>Hora</th>
                        <th>Total litros</th>
                        <th>Descripción</th>
                    </tr>
                    </thead>
                    <tbody>
                        <p hidden>{{ \Carbon\Carbon::setLocale('es') }}</p>
                    @foreach($milkings as $milkin_for)
                        <tr>
                            <td>{{ $milkin_for->production->animal->name }}</td>
                            <td>{{ \Carbon\Carbon::parse($milkin_for->date)->isoFormat('LL') }}</td>
                            <td>{{\Carbon\Carbon::parse($milkin_for->hour)->format('H:m a') }}</td>
                            <td>{{ $milkin_for->total_liters }}</td>
                            <td>
                                @if($milkin_for->description == "")
                                -N/A-
                                @else
                                {{ $milkin_for->description }}
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    </tbody>

                </table>
            </div>
            
        </div>
    </div>
    @endif
</div>
