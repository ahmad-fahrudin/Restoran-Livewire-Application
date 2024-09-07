<?php

namespace App\Http\Livewire\Admin\Category;

use App\Models\Category;
use Livewire\Component;

class AllCategory extends Component
{
    public $category;
    public function mount()
    {
        $this->category = Category::all();
    }
    public function render()
    {
        return view('livewire.admin.category.all-category')->layout('layouts.admin.app');
    }
}
