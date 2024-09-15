<div id="category">
    <div class="page-heading">
        <h3>Semua Category</h3>
    </div>

    <section class="section">
        <div class="card">
            <div class="card-header">
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahCategoryModal">Tambah
                    Baru</button>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover table-striped" id="table1">
                        <thead>
                            <tr>
                                <th style="width: 50px">No.</th>
                                <th>Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($category as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td><button class="btn btn-warning text-center" data-bs-toggle="modal"
                                            data-bs-target="#editCategoryModal{{ $item->id }}"><i
                                                class="bi bi-pencil-square"></i></button>
                                        <div class="modal fade" id="editCategoryModal{{ $item->id }}" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit
                                                            Category</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form wire:submit.prevent="save">
                                                            <div class="form-group row">
                                                                <label for="category"
                                                                    class="col-form-label col-sm-2">Nama :</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" wire:model="name"
                                                                        class="form-control"
                                                                        value="{{ $item->name }}">
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">Tutup</button>
                                                                <button type="submit"
                                                                    class="btn btn-primary">Simpan</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <a href="#" onclick="return confirm('Anda yakin Menghapus data?')"
                                            class="btn btn-danger text-center"><i class="bi bi-trash"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

    <!-- Modal untuk Tambah Category -->
    @livewire('admin.category.category-form')
</div>
