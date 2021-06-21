@extends("layouts.app")

@section("content")
    <div class="container mt-5" >
        <div class="row">
            <div class="col-sm-4">

                <h1 class="text-center my-4" >Mis datos</h1>
                <div class="card">
                    <div class="card-body">
                        <h5 class="mb-3"><b>Nombre: </b> {{$user->name}}</h5>
                        <h5 class="mb-3"><b>Email: </b> {{$user->email}}</h5>
                        <h5 class="mb-3"><b>Telefono: </b> {{$user->phone}}</h5>

                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="accordion" id="accordionExample">

                    <h1 class="display-3 text-center">Mis ordenes</h1>
                    @foreach($tickets as $ticket)
                        <div class="card">
                            <div class="card-header" id="headingOne">
                                <h2 class="mb-0">
                                    <form action="{{route("paymentMethod")}}" method="post"><h5>Orden: #{{$ticket->id}} @if($ticket->state != "PAGADO") @csrf <input type="hidden" name="token_ws" value="{{$ticket->token_ws}}"> <button class="btn btn-danger float-right">Pagar</button>  @endif</h5></form>
                                    <button class="btn btn-block text-left" type="button" data-toggle="collapse" data-target="#collapse{{$ticket->id}}"  aria-controls="collapse{{$ticket->id}}">
                                        Ver detalle del pedido
                                    </button>
                                </h2>
                            </div>

                            <div id="collapse{{$ticket->id}}" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                                <div class="card-body">
                                    <h5>Estado: <span class="badge badge-{{$ticket->state == 'PAGADO' ? 'success': 'danger'}}">{{$ticket->state}}</span></h5>
                                    <h5>Fecha del pago: {{$ticket->created_at}}</h5>
                                    <h5>Total del pedido: ${{$ticket->total}} CLP</h5>
                                    <hr />
                                    <h4 class="text-center">Detalle del pedido</h4>
                                    <hr />
                                    <table class="table table-borderless">
                                        <thead>
                                            <tr>
                                                <th>
                                                    Producto
                                                </th>
                                                <th>
                                                    Precio
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @for ($i = 0; $i < count($ticket->details); $i++)
                                                <tr>
                                                    <td><h2>{{$ticket->details[$i]->quantity}} x {{$ticket->products[$i]->name}}</h2></td>
                                                    <td><h5>$ {{$ticket->products[$i]->price * $ticket->details[$i]->quantity}} CLP</h5></td>
                                                </tr>
                                            @endfor
                                        </tbody>

                                    </table>

                                    <div class="card-footer text-right">
                                        <h5>Subtotal: ${{$ticket->total}} CLP</h5>
                                        <h5>Descuento: 0</h5>
                                        <h3>TOTAL: ${{$ticket->total}} CLP</h3>
                                    </div>

                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

    </div>
@endsection
