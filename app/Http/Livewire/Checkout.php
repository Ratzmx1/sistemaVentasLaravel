<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Auth;
use Illuminate\Support\Collection;
use Livewire\Component;

class Checkout extends Component
{
    /**
     * @var Collection
     */
    public $products = [];
    public $total = 0;


    public function mount(){
        $data = collect(unserialize(Auth::user()->cart));
        $prods = [];
        foreach ($data as $dat){
            $prod = Product::find($dat);
            $this->total += $prod['price'];
            array_push($prods, $prod);
        }
        $this->products = Auth::user()->cart ? collect($prods) : [];
    }

    public function eliminar($indice){
        $item = $this->products->pull($indice);
        $this->total -= $item['price'];
        $this->emit('deleteProduct',$indice);
        $this->dispatchBrowserEvent('alert',[
            'type'=>'success',
            'message'=>"Product deleted successfully to checkout"
        ]);
    }

    public function continueButton(){
        return redirect()->to(route("paymentMethod"));
    }

    public function render()
    {
        $this->emit("solicitoCarrito");
        return view('livewire.checkout')
            ->extends('layouts.app')
            ->section('content');
    }
}
