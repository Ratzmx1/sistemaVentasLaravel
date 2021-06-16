<div class=" container py-5">
    <div class="row"  >
        <div class="col-sm-9">
            <div class="card" >
                <div class="card-body">
                    <h1 class="text-center display-4 mb-5">Carrito</h1>
                    <div class="row">
                        @foreach($products as $index=>$prod)
                            <div class="col-sm-12 my-3">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <img class="imagen" src="{{$prod['image']}}" style="border-radius: 70%;" />
                                    </div>
                                    <div class="col-sm-8" style="display: block">
                                        <h2>{{$prod['name']}}</h2>
                                        <button style="position: absolute; right: 10%; margin-top: 15px" wire:click="eliminar({{$index}})" class="btn btn-danger">Eliminar</button>
                                        <h5 class="text-right mr-5" style="margin-top: auto; position: absolute; bottom: 5%; right: 5%">
                                            <b>Precio:</b> $ {{$prod['price']}}
                                        </h5>
                                    </div>
                                </div>
                                <hr/>
                            </div>
                        @endforeach
                    </div>

                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="position-fixed" style="width: 23%; ">
                <div class="card" >
                    <div class="card-body">
                        <h3 class="text-center mb-5">Descripcion</h3>
                        <h4 class="mb-5" > Subtotal  <div class="text-right">$ {{$total}} </div></h4>
                        <button class="btn btn-success btn-block" wire:click="continueButton()"> Confirmar </button>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <script>
        function updateHeight(){
            const docs = window.document.getElementsByClassName("imagen");
            let height = 99999;
            let width = 99999;
            Array.from(docs).forEach(doc=> {
                if(doc.height < height ) height = doc.height
                if(doc.width < width ) width = doc.width
            })
            Array.from(docs).forEach(doc=> {
                doc.height = height;
                doc.width = width;
            })
        }
        document.addEventListener("DOMContentLoaded",()=>{
            updateHeight();
        });
    </script>
</div>
