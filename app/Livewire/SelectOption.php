<?php

namespace App\Livewire;

use App\Models\City;
use App\Models\State;
use App\Models\Country;
use Livewire\Component;
use Livewire\Attributes\Reactive;
use Livewire\Attributes\Modelable;

class SelectOption extends Component
{
    #[Modelable] 
    public $value = null;

    public $name;
    #[Reactive]
    public $options;

    public function mount($name, $options)
    {
        $this->name = $name;
        $this->options = $options;
        $this->options->ensure([Country::class, State::class, City::class]);
    }

    public function render()
    {
        return view('livewire.select-option');
    }
}
