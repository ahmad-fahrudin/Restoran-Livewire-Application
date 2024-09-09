<div>
    <div class="page-heading">
        <h3>Semua Booking</h3>
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
                                <th>Date</th>
                                <th>Jumlah Orang</th>
                                <th>Status</th>
                                <th style="width: 200px">Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($booking as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->date }}</td>
                                    <td>{{ $item->jumlah_orang }}</td>
                                    <td>{{ $item->status }}</td>
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
