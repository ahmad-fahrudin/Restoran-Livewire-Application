<div>
    <div class="page-heading">
        <h3>Semua Product</h3>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header">
                <a wire:click="show_create_form" class="btn btn-primary">Tambah Baru</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover table-striped" id="table1">
                        <thead>
                            <tr>
                                <th style="width: 10px">No.</th>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Price</th>
                                <th style="width: 200px">Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($foods as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td><img src="{{ asset('storage/' . $item->image) }}" alt=""
                                            style="width: 50px; height:40px;">
                                    </td>
                                    <td>{{ $item->name }}</td>
                                    <td>Rp.{{ number_format($item->price, 0, ',', '.') }}</td>
                                    <td>
                                        <a href="" class="btn btn-warning text-center">edit</a>
                                        <a href="" onclick="return confirm('Anda yakin Menghapus data?')"
                                            class="btn
                                            btn-danger text-center">delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</div>
