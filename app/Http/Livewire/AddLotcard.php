<?php

namespace App\Http\Livewire;

use Livewire\Component;

class AddLotcard extends Component
{

    public $ProductID;

    public function mount($post) {
        $this->ProductID = $post;
    }

    public function render()
    {
        return view('livewire.add-lotcard');
    }
}
