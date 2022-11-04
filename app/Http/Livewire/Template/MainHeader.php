<?php

namespace App\Http\Livewire\Template;

use Livewire\Component;

class MainHeader extends Component
{
    public $prueba = 'Prueba';
    public function render()
    {
        return view('livewire.template.main-header');
    }
}
