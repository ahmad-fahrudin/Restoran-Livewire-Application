<div>
    <div class="page-heading">
        <h3>Create Product</h3>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header">
                <a wire:click="show_index" class="btn btn-secondary">Kembali</a>
                @if (session()->has('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
            </div>
            <div class="card-body">
                <form wire:submit.prevent="add_foods()">
                    <div class="row">

                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="no_kk">Nama</label>
                                <input type="text" name="name" id="name" class="form-control"
                                    wire:model.lazy="name" placeholder="Masukkan nama">
                                @error('name')
                                    <span class="text-red-500 text-danger text-xs">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="nik">Category</label>
                                <select name="category_id" wire:model.lazy="category_id" class="form-control" required>
                                    <option selected>-----Pilih Category-----</option>
                                    @forelse ($category as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @empty
                                        <option value="">Category Kosong</option>
                                    @endforelse
                                </select>
                                @error('category_id')
                                    <span class="text-red-500 text-danger text-xs">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="address">Description</label>
                        <textarea name="description" id="description" wire:model.lazy="description" cols="50" rows="4"
                            class="form-control" placeholder="Deskripsi Product"></textarea>
                        @error('price')
                            <span class="text-red-500 text-danger text-xs">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="name">Image</label>
                                <input type="file" name="image" id="image" wire:model.lazy="image"
                                    class="form-control">
                                @error('image')
                                    <span class="text-red-500 text-danger text-xs">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="nik">Price</label>
                                <input type="number" wire:model.lazy="price" name="price" id="price"
                                    class="form-control" data-parsley-type="number" placeholder="0">
                                @error('price')
                                    <span class="text-red-500 text-danger text-xs">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="flex">
                        <a wire:click="show_index" class="btn btn-danger">Batal</a>
                        <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>
