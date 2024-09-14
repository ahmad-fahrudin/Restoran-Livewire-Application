<div>
    <div class="container-xxl py-5 bg-dark hero-header mb-5" style="margin-top: -25px">
        <div class="container text-center my-5 pt-5 pb-4">
            <h1 class="display-3 text-white mb-3 animated slideInDown">My items</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center text-uppercase">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">My items</a></li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="container">

        <div class="col-md-12">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">No.</th>
                        <th scope="col">Name</th>
                        <th scope="col">Date</th>
                        <th scope="col">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        use Carbon\Carbon;
                    @endphp
                    @foreach ($allBookings as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ Carbon::parse($item->date)->locale('id')->translatedFormat('l, d F Y h:i A') }}
                            </td>
                            @if ($item->status == 'Successfully')
                                <td><a href="" class="btn btn-warning">Review</a></td>
                            @else
                                <td>
                                    <a href="{{ route('pay.booking', $item->id) }}" class="btn btn-success">Continue
                                        Pay</a>
                                </td>
                            @endif
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
</div>
