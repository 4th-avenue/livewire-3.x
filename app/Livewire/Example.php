<?php

namespace App\Livewire;

use App\Models\Country;
use Livewire\Component;

class Example extends Component
{
    public $amount = 10;

    public function load()
    {
        $this->amount = $this->amount + 10;
    }

    public function render()
    {
        return view('livewire.example', [
            'countries' => Country::take($this->amount)->get(),
        ]);
    }
}
