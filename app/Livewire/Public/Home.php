<?php

namespace App\Livewire\Public;

use Livewire\Attributes\Title;
use Livewire\Component;

class Home extends Component
{
    public function mount(){
        
    }

    #[Title('Home')]
    public function render()
    {
        return view('livewire.public.home');
    }
}
