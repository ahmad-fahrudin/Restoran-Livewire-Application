<?php

namespace App\Http\Livewire\Admin\Foods;

use App\Models\Foods;
use Livewire\Component;
use App\Models\Category;
use Livewire\WithFileUploads;

class AllFoods extends Component
{
    use WithFileUploads;
    public $name;
    public $category_id;
    public $price;
    public $description;
    public $image;
    public $stock;
    public $_page;
    public function mount()
    {
        $this->_page = 'index';
    }
    public function show_index()
    {
        $this->_page = "index";
    }
    public function show_create_form()
    {
        $this->_page = "create";
    }
    public function add_foods()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'price' => 'required|numeric',
            'description' => 'nullable|string',
            'image' => 'nullable|image|max:1024', // validasi file gambar
        ]);

        if ($this->image) {
            $imagePath = $this->image->store('products', 'public');
        }

        Foods::create([
            'name' => $this->name,
            'category_id' => $this->category_id,
            'price' => $this->price,
            'description' => $this->description,
            'image' => $imagePath ?? null,
        ]);
        $this->name = null;
        $this->category_id = null;
        $this->price = null;
        $this->description = null;
        $this->image = null;

        toast('Berhasil menambahkan data!', 'success')->timerProgressBar();
        $this->_page = "index";
    }
    public function render()
    {
        $foods = Foods::all();
        $category = Category::all();
        if ($this->_page == 'index') {
            return view('livewire.admin.foods.all-foods', compact('foods'))->layout('layouts.admin.app');
        } else if ($this->_page == 'create') {
            return view('livewire.admin.foods.create-foods', compact('category'))->layout('layouts.admin.app');
        }
    }
}
