<?php

namespace App\Http\Livewire;

use Http;
use Livewire\Component;

class SelectDirection extends Component
{
    public $regionInput = '';
    public $areasInput = '';
    public $cityInput = '';
    public $regiones = [];
    public $coverageAreas = [];
    public $cities = [];
    public $selected = false;
    public $selectedCity = null;
    public $number;
    public $numbers = [];
    public $selectedNumber = null;
    public $numberSelected = false;



    public function mount(){
        $data = Http::get("https://testservices.wschilexpress.com/georeference/api/v1.0/regions");
        $this->regiones = $data->json()['regions'];
//        dd($this->regiones);
    }

    public function updatedRegionInput($value){
        $ciudad = $this->regiones[$value];
        $data = Http::get("https://testservices.wschilexpress.com/georeference/api/v1.0/coverage-areas?RegionCode=".$ciudad['regionId']."&type=0");
        $this->coverageAreas = $data->json()['coverageAreas'];
//        dd($this->coverageAreas);
        $this->selected = false;

    }

    public function updatedCityInput($value){
        $area = $this->coverageAreas[$this->areasInput];
//        dd([
//            'countyName' => $area['countyName'],
//            'streetName' => $value,
//            'streetNameEnabled'=>true,
//            'roadType'=>true
//        ]);
        $data = Http::post("https://testservices.wschilexpress.com/georeference/api/v1.0/streets/search",[
            'countyName' => $area['countyName'],
            'streetName' => $value,
            'streetNameEnabled'=>true,
            'roadType'=>0,
            'pointsOfInterestEnabled'=>true
        ]);
//        dd($data->json());
        $this->cities = $data['streets'];
        $this->selected = false;

    }

    public function updatedNumber($value){
        $data = Http::get("https://testservices.wschilexpress.com/georeference/api/v1.0/streets/".$this->selectedCity['streetId']."/numbers",[
            'streetNumber' => $value,
        ]);
        $this->numbers = $data->json()['streetNumbers'];
//        dd( $data, $data->json(), $data->headers(), $this->numbers);
//        dd($this->numbers);
//        dd($this->numbers);
    }


    public function selectCity($value){
        $data = $this->cities[$value];
        $this->selectedCity = $data;
        $this->cityInput = $data['streetName'];
        $this->selected = true;
    }

    public function selectNumberButton($value){
//        dd($this->numbers, $value);
        $data = $this->numbers[$value];
        $this->selectedNumber = $data;
        $this->number = $data['number'];
        $this->numberSelected = true;
    }

    public function render()
    {
//        return view('livewire.create-direction')
//            ->extends('layouts.app')
//            ->section('content');
        return view('livewire.select-direction');
    }
}
