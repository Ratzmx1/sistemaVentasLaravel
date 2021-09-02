<?php

namespace App\Http\Livewire;

use App\Models\Direction;
use Livewire\Component;

class DirectionList extends Component
{
    public $directions = [];

    public function mount(){
        $this->directions = Direction::all();
    }


    public function render()
    {
        return view('livewire.direction-list')
            ->extends('layouts.app')
            ->section('content');
    }
}
