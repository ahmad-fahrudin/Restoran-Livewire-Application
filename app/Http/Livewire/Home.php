<?php

namespace App\Http\Livewire;

use App\Models\Foods;
use App\Models\Review;
use App\Models\Booking;
use Livewire\Component;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class Home extends Component
{
    public function render()
    {
        $breakfastFoods = Category::where('name', 'Breakfast')->first()->foods()->take(4)->orderBy('id', 'desc')->get();
        $launchFoods = Category::where('name', 'Launch')->first()->foods()->take(4)->orderBy('id', 'desc')->get();
        $dinnerFoods = Category::where('name', 'Dinner')->first()->foods()->take(4)->orderBy('id', 'desc')->get();
        $reviews = Review::select()->take(4)->orderBy('id', 'desc')->get();

        return view('livewire.home', compact('breakfastFoods', 'launchFoods', 'dinnerFoods', 'reviews'));
    }
}
