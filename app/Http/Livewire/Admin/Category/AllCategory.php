<?php

namespace App\Http\Livewire\Admin\Category;

use Livewire\Component;
use App\Models\Category;
use RealRashid\SweetAlert\Facades\Alert;

class AllCategory extends Component
{
    public function render()
    {
        return view('livewire.admin.category.all-category', [
            'category' => Category::all(),
        ])->layout('layouts.admin.app');
    }
}
