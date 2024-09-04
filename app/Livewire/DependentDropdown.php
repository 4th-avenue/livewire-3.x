<?php

namespace App\Livewire;

use App\Models\City;
use App\Models\State;
use App\Models\Country;
use Livewire\Component;

class DependentDropdown extends Component
{
    public $countries;
    public $states;
    public $cities;

    public $selectedCountry = null;
    public $selectedState = null;

    public function mount()
    {
        $this->countries = Country::all();
    }

    public function updatedSelectedCountry($country)
    {
        $this->states = State::where('country_id', $country)->get();
        $this->selectedState = null;
    }

    public function updatedSelectedState($state)
    {
        $this->cities = City::where('state_id', $state)->get();
    }

    public function render()
    {
        return view('livewire.dependent-dropdown')->layout('layouts.app');
    }
}
