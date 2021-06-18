@extends("layouts.app")

@section("content")
    <div class="container">
        <h1 class="display-1 text-success text-center"  style="margin: 3vh ">Aceptado</h1>
        <div class="card" style="margin: 0 14vw">
            <div class="card-body" >
                <div class="row" style="margin-bottom: 2vh">
                    <div class="col">
                        <h5>
                            <b class="text-left"> Numero de orden: </b>
                        </h5>
                    </div>
                    <div class="col">
                        {{$data->buyOrder}}
                    </div>
                </div>
                <div class="row" style="margin-bottom: 2vh">
                    <div class="col">
                        <h5>
                            <b class="text-left"> Total: </b>
                        </h5>
                    </div>
                    <div class="col">
                        {{$data->amount}}
                    </div>
                </div>

                <div class="row" style="margin-bottom: 2vh">
                    <div class="col">
                        <h5>
                            <b class="text-left"> Tarjeta: </b>
                        </h5>
                    </div>
                    <div class="col">
                        xxxx xxxx xxxx {{$data->cardNumber}}
                    </div>
                </div>

                @if($data->installmentsNumber != 0)
                <div class="row" style="margin-bottom: 2vh">
                    <div class="col">
                        <h5>
                            <b class="text-left"> Cutoas: </b>
                        </h5>
                    </div>
                    <div class="col">
                        {{$data->installmentsNumber}}
                    </div>
                </div>

                <div class="row" style="margin-bottom: 2vh">
                    <div class="col">
                        <h5>
                            <b class="text-left"> Valor Cuota: </b>
                        </h5>
                    </div>
                    <div class="col">
                            {{$data->installmentsAmount}}
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
@endsection
