<div class="container">
    <h1 class="text-center display-3 mb-5" >Productos</h1>

    <div class="row  mb-5">
        @foreach ($products as $product)
            <div class="col-md-4 col-sm-6">
                <div class="card mb-4" >
                    <img class="card-img-top imagen"  style="object-fit: cover;" src="{{$product->image}}" alt="{{$product->name." image"}}" />
                    <div class="card-body">
                        <h5 class="card-title text-left">
                            <b>
                                {{$product->name}}
                            </b>
                        </h5>
                        <p class="text-right">
                            $ {{$product->price}}
                        </p>
                        <button
                            style="border-radius: 0.8vh"
                            wire:click="addCart({{ $product }})"
                            class="btn btn-success btn-block"
                        >
                            Agregar al carrito
                        </button>
                    </div>
                </div>
            </div>
        @endforeach
    </div>


    <div class="row justify-content-center mb-5">
        {{ $links->links() }}
    </div>

    <script>
        function updateHeight(){
            const docs = window.document.getElementsByClassName("imagen");
            let height = 99999;
            Array.from(docs).forEach(doc=> {
                if(doc.height < height ) height = doc.height
            })
            Array.from(docs).forEach(doc=> {
                console.log(doc)
                doc.height = height;
            })
        }

        document.addEventListener("productsUpdated",()=>{
            updateHeight();
        });
        document.addEventListener("DOMContentLoaded",()=>{
            updateHeight();
        });
    </script>

</div>
