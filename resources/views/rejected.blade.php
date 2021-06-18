@extends("layouts.app")

@section("content")
    <div class="container">
        <h1 class="display-1 text-danger text-center"  style="margin: 3vh ">Rechazado</h1>
        <div class="card" style="margin: 0 14vw">
            <div class="card-body" >
                <h3>Ha ocurrido un error al intentar procesar el pago</h3>
                <form action="{{route("paymentMethod")}}" method="post">
                    @csrf
                    <input type="hidden" name="token_ws" value="{{$token}}">
                    <button class="btn btn-primary btn-block">Pulse aqui para reintentar</button>
                </form>
            </div>
        </div>
    </div>
@endsection
