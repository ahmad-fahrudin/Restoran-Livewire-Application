<?php

namespace App\Http\Livewire\Menu;

use Livewire\Component;
use App\Models\Category;

class Menu extends Component
{
    public function render()
    {
        $breakfastFoods = Category::where('name', 'Breakfast')->first()->foods()->take(4)->orderBy('id', 'desc')->get();
        $launchFoods = Category::where('name', 'Launch')->first()->foods()->take(4)->orderBy('id', 'desc')->get();
        $dinnerFoods = Category::where('name', 'Dinner')->first()->foods()->take(4)->orderBy('id', 'desc')->get();

        return view('livewire.menu.menu', compact('breakfastFoods', 'launchFoods', 'dinnerFoods'));
    }
}
