<?php

namespace App\Http\Livewire;

use Auth;
use Livewire\Component;

class CartIcon extends Component
{
    public $quantity;

    protected $listeners = ['setCuantityItems'];

    public function mount(){
        $this->quantity = count(Auth::user()->cart ? unserialize(Auth::user()->cart) : []);
    }

    public function setCuantityItems($number){
        $this->quantity = $number;
    }

    public function render()
    {
        return <<<'blade'
            <button class="btn" type="button" onclick="openCart()" id="cartIcon" >
                <i class="fa" style="font-size:24px">&#xf07a;</i>
                <span class='badge' id='lblCartCount'> {{$quantity}} </span>
            </button>
        blade;
    }
}
