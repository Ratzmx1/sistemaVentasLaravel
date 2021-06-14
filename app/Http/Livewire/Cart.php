<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Auth;
use Illuminate\Support\Collection;
use Livewire\Component;

class Cart extends Component
{
    /**
     * @var Collection
     */
    public $cartItems, $total;

    protected $listeners = ['addProduct'];


    public function mount(){
        $prods = [];
        $this->total = 0;
        $data = collect(unserialize(Auth::user()->cart));
        foreach ($data as $dat){
            array_push($prods, Product::find($dat));
        }
        $this->cartItems = Auth::user()->cart ? collect($prods) : [];
        foreach ($this->cartItems as $item){
            $this->total += $item['price'];
        }
    }


    public function delete($index){
        $item = $this->cartItems->pull($index);
        $this->total -= $item['price'];

        $user = Auth::user();
        $prods = [];
        foreach ($this->cartItems as $item){
            array_push($prods,  $item['id']);
        }
        $user->cart = serialize($prods);
        $user->save();
        $this->emit('cartDeleted',$item);
        $this->emit("setCuantityItems",count($this->cartItems));

    }

    public function addProduct($product){
        $arr = collect($this->cartItems);

        $tamano = count($arr);
        $arr->add($product);
        $arr = $arr->unique();

        if(count($arr) > $tamano){
            $this->cartItems = $arr;
            $user = Auth::user();
            $prods = [];
            foreach ($this->cartItems as $item){
                array_push($prods,  $item['id']);
            }
            $user->cart = serialize($prods);
            $user->save();

            $this->dispatchBrowserEvent('alert',[
                'type'=>'success',
                'message'=>"Product added successfully to the cart"
            ]);
            $this->total += $product['price'];
            $this->emit("setCuantityItems",count($this->cartItems));

        }else{
            $this->dispatchBrowserEvent('alert',[
                'type'=>'error',
                'message'=>"Product already on the cart"
            ]);
        }
    }



    public function render()
    {

        return view('livewire.cart');
    }
}
