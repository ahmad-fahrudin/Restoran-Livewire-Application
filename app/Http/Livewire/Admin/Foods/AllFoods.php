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
    public $edit_foods_id;
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
        $this->resetForm();
        $this->_page = "create";
    }
    public function resetForm()
    {
        $this->name = null;
        $this->category_id = null;
        $this->price = null;
        $this->description = null;
        $this->image = null;
        $this->stock = null;
        $this->edit_foods_id = null;
    }
    public function show_edit_form($id)
    {
        $this->_page = "edit";
        $this->edit_foods_id = $id;
        $item = Foods::findOrFail($id);
        $this->name = $item->name;
        $this->category_id = $item->category_id;
        $this->price = $item->price;
        $this->description = $item->description;
        $this->image = $item->image;
    }

    public function add_foods()
    {
        // Jika ada edit_foods_id maka update
        if ($this->edit_foods_id) {
            $this->validate([
                'name' => 'required|string|max:255',
                'category_id' => 'required|exists:categories,id',
                'price' => 'required|numeric',
                'description' => 'nullable|string',
                'image' => 'nullable|image|max:2048', // validasi file gambar
            ]);

            $food = Foods::findOrFail($this->edit_foods_id);

            // Jika ada gambar baru yang diunggah
            if ($this->image && is_object($this->image)) {
                // Hapus gambar lama jika ada
                if ($food->image && File::exists(public_path($food->image))) {
                    File::delete(public_path($food->image));
                }

                // Resize dan simpan gambar baru
                $image = Image::read($this->image->getRealPath());
                $image->resize(300, 300, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                });

                $imageName = time() . '.' . $this->image->getClientOriginalExtension();
                $image->save(public_path('upload/foods/' . $imageName));

                $food->image = 'upload/foods/' . $imageName;
            }

            // Update data
            $food->name = $this->name;
            $food->category_id = $this->category_id;
            $food->price = $this->price;
            $food->description = $this->description;
            $food->save();

            session()->flash('message', 'Food updated successfully.');
            $this->resetForm(); // Reset form setelah update
            $this->_page = "index";
        } else {
            // Jika tidak ada edit_foods_id maka lakukan create seperti biasa
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

            session()->flash('message', 'Data berhasil disimpan!');
            $this->resetForm(); // Reset form setelah create
            $this->_page = "index";
        }
    }
    public function edit($id)
    {
        $item = Foods::findOrFail($id);
        $this->edit_foods_id = $id;
        $this->name = $item->name;
        $this->category_id = $item->category_id;
        $this->price = $item->price;
        $this->description = $item->description;
        $this->image = $item->image;
        $this->_page = "edit";
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

        session()->flash('message', 'Data berhasil disimpan!');
    }
    public function render()
    {
        $foods = Foods::all();
        $category = Category::all();
        if ($this->_page == 'index') {
            return view('livewire.admin.foods.all-foods', compact('foods'))->layout('layouts.admin.app');
        } else if ($this->_page == 'create') {
            return view('livewire.admin.foods.create-foods', compact('category'))->layout('layouts.admin.app');
        } else if ($this->_page == "edit") {
            return view('livewire.admin.foods.edit-foods', [
                'foods' => Foods::findOrFail($this->edit_foods_id),
                'category' => Category::all(),
            ]);
        }
    }
}
