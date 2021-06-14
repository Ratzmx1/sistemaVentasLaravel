<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Checkout extends Component
{
    public function render()
    {
        return view('livewire.checkout')
            ->extends('layouts.app')
            ->section('content');
    }
}
