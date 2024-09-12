<div>
    <div class="page-heading">
        <h3>Semua Order</h3>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover table-striped" id="table1">
                        <thead>
                            <tr>
                                <th style="width: 50px">No.</th>
                                <th>Name</th>
                                <th>Telepon</th>
                                <th>Total Price</th>
                                <th>Status</th>
                                <th style="width: 200px">Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($checkout as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->phone }}</td>
                                    <td>Rp.{{ number_format($item->price, 0, ',', '.') }}</td>
                                    <td>
                                        @if ($item->status == 'Bayar Berhasil')
                                            <button class="btn btn-success">{{ $item->status }}</button>
                                        @else
                                            <button class="btn btn-secondary">{{ $item->status }}</button>
                                        @endif
                                    </td>
                                    <td>
                                        <a wire:click="delete({{ $item->id }})"
                                            onclick="return confirm('Anda yakin Menghapus data?')"
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
