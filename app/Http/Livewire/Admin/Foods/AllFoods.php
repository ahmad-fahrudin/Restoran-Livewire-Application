<?php

namespace App\Http\Livewire\Admin\Foods;

use App\Models\Foods;
use Livewire\Component;

class AllFoods extends Component
{
    public function render()
    {
        $foods = Foods::all();
        return view('livewire.admin.foods.all-foods', compact('foods'))->layout('layouts.admin.app');
    }
}
