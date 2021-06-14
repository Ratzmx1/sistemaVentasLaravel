
<div id="sidebar" class="py-5 px-2">

    <h4 class="text-center" style="margin-bottom: 3vh">Carrito de compras</h4>

    @foreach($cartItems as $index=>$item)
        <div wire:key="{{$item['id']}}" class="">
            <button wire:click="delete({{$index}})" class="btn btn-block" type="button" >


                <b class="float-left">  <img src="{{$item['image']}}" style="width: 40px;height: 40px;border-radius: 50%" alt="a">   {{$item['name']}}</b>
                <br/>
                <div class="float-right text-muted">
                    $ {{$item['price']}} <i class="fas fa-trash" aria-hidden="true"></i>
                </div>
            </button>
            <hr class="" />
        </div>
    @endforeach
    <div style="" >
        @if(count($cartItems))
            <div class="mx-1 mb-5">
                <h5 class=""> Total: <div class="text-right"><b>$ {{$total}}</b></div> </h5>
                <a href="{{route("checkout")}}" class="btn btn-success btn-block">Comprar</a>
            </div>
        @else
            <h5 class="text-center mt-5" >No hay productos en el carrito</h5>
        @endif
    </div>


    <script>
        function openCart(){
            window.$('#sidebar').toggleClass('visibilityOn');
            window.$('#mainContent').toggleClass('visibilityOn');
        }

        function closeCart(){
            window.$("#sidebar").removeClass('visibilityOn')
            window.$('#mainContent').removeClass('visibilityOn');
        }
    </script>
</div>
{{--<div class="dropdown">--}}
{{--    <button class="btn " type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
{{--        <i class="fa" style="font-size:24px">&#xf07a;</i>--}}
{{--        <span class='badge' id='lblCartCount'> {{count($cartItems)}} </span>--}}
{{--    </button>--}}
{{--    <div class="dropdown-menu  dropdown-menu-right" aria-labelledby="dropdownMenuButton">--}}
{{--        @foreach($cartItems as $index=>$item)--}}
{{--            <div wire:key="{{$item['id']}}" class="">--}}
{{--                <button wire:click="delete({{$index}})" class="dropdown-item dropdown-item-text m-0" type="button" >--}}
{{--                    <b> {{$item['name']}}</b>--}}
{{--                    <br/>--}}
{{--                    <div class="float-right text-muted">--}}
{{--                        $ {{$item['price']}} <i class="fas fa-times"></i>--}}
{{--                    </div>--}}
{{--                </button>--}}
{{--                <hr />--}}
{{--            </div>--}}
{{--        @endforeach--}}
{{--        @if(count($cartItems))--}}
{{--            <div class="mx-1">--}}
{{--                <h5 class=""> Total: <div class="text-right"><b>$ {{$total}}</b></div> </h5>--}}
{{--                <a href="{{route("checkout")}}" class="btn btn-success btn-block">Comprar</a>--}}
{{--            </div>--}}

{{--            @else--}}
{{--            <p class="dropdown-item-text mt-3">No hay productos en el carrito</p>--}}
{{--            @endif--}}
{{--    </div>--}}

{{--</div>--}}



