<div class="">
    <div class="card">
        <div class="card-body">
            <div class="form-group">
                <label for="select1">Region</label>
                <select id="select1" wire:model="regionInput" class="form-control">
                    <option value="" disabled>Seleccione una opcion</option>
                    @foreach($regiones as $index => $region)
                        <option value="{{$index}}">{{$region['regionName']}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="select2">Area
                    <div wire:loading wire:target="regionInput" class="spinner-border spinner-border-sm text-primary" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>
                </label>
                <select id="select2" class="form-control" @if(count($coverageAreas) == 0) disabled @endif wire:model="areasInput">
                    <option value="" disabled>Seleccione una opcion</option>
                    @foreach($coverageAreas as $index => $area)
                        <option value="{{$index}}">{{$area['coverageName']}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="city">
                    Direccion
                    {{--                    Loading cityInput               --}}
                    <div wire:loading  wire:target="cityInput" class="spinner-border spinner-border-sm text-primary" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>
                    {{--                    Loading areasInput               --}}

                    <div wire:loading wire:target="areasInput"  class="spinner-border spinner-border-sm text-primary" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>
                </label>
                <input id="city" @if($areasInput == '') disabled @endif wire:model="cityInput" class="form-control" style="border-bottom-left-radius: 0; border-bottom-right-radius: 0;" />
                @if(strlen($cityInput) >= 3)
                    @if(count($cities) > 1 and !$selected)
                        <ul class="list-group">

                            @foreach($cities as $index=>$city)
                                <li
                                    wire:click='selectCity({{$index}})'
                                    class="list-group-item"
                                >
                                    <button class="btn btn-block text-left">

                                        {{$city['streetName']}}
                                    </button>
                                </li>
                            @endforeach

                        </ul>
                    @endif
                @endif
            </div>


            <div class="form-group">
                <label for="number">
                    Number
                    {{--                    Loading cityInput               --}}
                    <div wire:loading  wire:target="number" class="spinner-border spinner-border-sm text-primary" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>
                    {{--                    Loading areasInput               --}}

                    <div wire:loading wire:target="areasInput"  class="spinner-border spinner-border-sm text-primary" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>
                </label>
                <input id="number" @if($cityInput == null) disabled @endif wire:model="number" class="form-control" style="border-bottom-left-radius: 0; border-bottom-right-radius: 0;" />
                @if(count($numbers) >= 1 and !$numberSelected)
                    <ul class="list-group">
                        @foreach($numbers as $index=>$num)
                            <li
                                class="list-group-item"
                            >
                                <button
                                    wire:click="selectNumberButton({{$index}})"
                                    class="btn btn-block text-left">
                                        {{$num['number']}}
                                </button>
                            </li>
                        @endforeach
                    </ul>
                @endif
            </div>
            <button class="btn btn-primary">Guardar</button>
        </div>
    </div>
</div>
