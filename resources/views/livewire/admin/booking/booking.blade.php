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
                            @php
                                use Carbon\Carbon;
                            @endphp
                            @foreach ($booking as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ Carbon::parse($item->date)->locale('id')->translatedFormat('l, d F Y h:i A') }}
                                    </td>
                                    <td>{{ $item->jumlah_orang }}</td>
                                    <td>
                                        @if ($item->status == 'Successfully')
                                            <button class="btn btn-success">{{ $item->status }}</button>
                                        @else
                                            <button class="btn btn-secondary">{{ $item->status }}</button>
                                        @endif
                                    </td>
                                    <td>
                                        <a wire:click="delete({{ $item->id }})"
                                            onclick="return confirm('Anda yakin Menghapus data?')"
                                            class="btn
                                            btn-danger text-center"><i
                                                class="bi bi-trash"></i></a>
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
