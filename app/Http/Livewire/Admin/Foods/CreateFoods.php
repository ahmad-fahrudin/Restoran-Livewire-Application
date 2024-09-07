<?php

namespace App\Http\Livewire\Admin\Foods;

use Livewire\Component;

class CreateFoods extends Component
{
    public function render()
    {
        return view('livewire.admin.foods.create-foods')->layout('layouts.admin.app');
    }
}
