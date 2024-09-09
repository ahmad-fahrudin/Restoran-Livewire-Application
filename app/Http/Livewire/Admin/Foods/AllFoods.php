<?php

namespace App\Http\Livewire\Admin\Foods;

use App\Models\Foods;
use Livewire\Component;
use App\Models\Category;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Laravel\Facades\Image;

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
            'image' => 'nullable|image|max:2048', // validasi file gambar
        ]);

        if ($this->image) {
            // Resize gambar menggunakan Intervention Image
            $image = Image::read($this->image->getRealPath());
            $image->resize(300, 300, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });

            // Simpan gambar yang sudah di-resize
            $imageName = time() . '.' . $this->image->getClientOriginalExtension();
            $image->save(public_path('upload/foods/' . $imageName));

            $imagePath = 'upload/foods/' . $imageName;
        }

        Foods::create([
            'name' => $this->name,
            'category_id' => $this->category_id,
            'price' => $this->price,
            'description' => $this->description,
            'image' => $imagePath ?? null,
        ]);

        session()->flash('message', 'Food added successfully.');
        $this->_page = "index";
    }
    public function delete($id)
    {
        $food = Foods::findOrFail($id);

        // Hapus gambar jika ada
        if ($food->image) {
            File::delete(public_path($food->image));
        }

        // Hapus data dari database
        $food->delete();

        session()->flash('message', 'Room Deleted Successfully.');
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
