<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;
use Livewire\WithPagination;

class Products extends Component
{
    use WithPagination;
    protected $paginationTheme = 'simple-tailwind';
    protected $listeners = ['cartDeleted'];
    public $products;

    public function addCart($prod){
        $this->emit('addProduct',$prod);
    }

    public function cartDeleted($item){
        $this->dispatchBrowserEvent('alert',[
            'type'=>'success',
            'message'=>"Product deleted successfully from the cart"
        ]);
    }

    public function render(){
        $prod = Product::paginate(9);
        $this->products = collect($prod->items());
        $this->dispatchBrowserEvent('productsUpdated');

        return view('livewire.products',[
            'links'=>$prod
        ])
            ->extends('layouts.app')
            ->section('content');
    }
}
