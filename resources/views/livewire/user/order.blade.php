<div>
    <div class="container-xxl py-5 bg-dark hero-header mb-5" style="margin-top: -25px">
        <div class="container text-center my-5 pt-5 pb-4">
            <h1 class="display-3 text-white mb-3 animated slideInDown">My Orders</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center text-uppercase">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">My Orders</a></li>
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
                        <th scope="col">phone number</th>
                        <th scope="col">price</th>
                        <th scope="col">Review</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($allOrders as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->phone }}</td>
                            <td> Rp{{ number_format($item->price, 0, ',', '.') }}</td>
                            @if ($item->status == 'Successfully')
                                <td><a href="" class="btn btn-warning">Review</a></td>
                            @else
                                <td>
                                    <a href="{{ route('pay', $item->id) }}" class="btn btn-success">Continue
                                        Payment</a>
                                </td>
                            @endif
                        </tr>
                    @endforeach


                </tbody>
            </table>
        </div>

    </div>
</div>
