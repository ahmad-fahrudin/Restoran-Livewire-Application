<?php

namespace App\Http\Livewire\Admin\Category;

use Livewire\Component;
use App\Models\Category;

class CategoryForm extends Component
{
    public $name;

    protected $rules = [
        'name' => 'required|string|max:255',
    ];

    public function save()
    {
        $this->validate();

        Category::create([
            'name' => $this->name,
        ]);

        $this->reset('name');

        toast('Berhasil menambahkan data!', 'success')->timerProgressBar();
        return redirect()->route('all.category');
    }
    public function render()
    {
        return view('livewire.admin.category.category-form');
    }
}
