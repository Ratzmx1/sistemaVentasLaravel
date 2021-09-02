<div class="container">

    <h1 class="display-2 text-center my-3">Direcciones</h1>



    <div class="row">

        @foreach($directions as $direction)
            <p>{{serialize($direction)}}</p>
        @endforeach
        <div class="col-sm-4" style="">
            <div class="card" style="height: 8vw;display: flex; align-items: center;">
                <div class="card-body" style="display: flex; justify-content: center" >
                    <i class="fa fa-plus" style="font-size: 4rem"></i>
                </div>
            </div>
        </div>
    </div>
        <livewire:select-direction />
</div>
