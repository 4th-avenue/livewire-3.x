<?php

namespace App\Livewire;

use Livewire\Component;

class DependentDropdown extends Component
{
    public function render()
    {
        return view('livewire.dependent-dropdown')->layout('layouts.app');
    }
}
