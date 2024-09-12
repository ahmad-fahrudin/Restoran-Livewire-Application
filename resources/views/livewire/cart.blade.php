<div>
    <div class="container-xxl py-5 bg-dark hero-header mb-5" style="margin-top: -25px">
        <div class="container text-center my-5 pt-5 pb-4">
            <h1 class="display-3 text-white mb-3 animated slideInDown">Cart</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center text-uppercase">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Cart</a></li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="container">
        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif
    </div>

    <div class="container">
        <div class="col-md-12">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">No.</th>
                        <th scope="col">Image</th>
                        <th scope="col">Name</th>
                        <th scope="col">Price</th>
                        <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($cartItems->count() > 0)
                        @foreach ($cartItems as $food)
                            <tr>
                                <th>{{ $loop->iteration }}</th>
                                <th><img width="60" height="60" src="{{ asset($food->image) }}"></th>
                                <td>{{ $food->name }}</td>
                                <td>Rp{{ number_format($food->price, 0, ',', '.') }}</td>
                                <td>
                                    <button class="btn btn-danger text-white"
                                        wire:click="deleteItem({{ $food->id }})">
                                        Delete
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="5">
                                <h3 class="alert alert-success">Kamu belom menambahkan ke Cart</h3>
                            </td>
                        </tr>
                    @endif
                </tbody>
            </table>

            <div class="position-relative mx-auto" style="max-width: 400px; padding-left: 679px;">
                <p style="margin-left: -7px;" class="w-19 py-3 ps-4 pe-5" type="text">
                    Rp{{ number_format($price, 0, ',', '.') }}</p>

                @if ($price == 0)
                    <p style="width: 241px;" class="alert alert-success">you cannot check out when you have no items in
                        cart
                    </p>
                @else
                    <form wire:click.prevent="prepareCheckout">
                        <input type="hidden" value="{{ $price }}" name="price">
                        <button type="submit" name="submit"
                            class="btn btn-primary py-2 top-0 end-0 mt-2 me-2">Checkout</button>
                    </form>
                @endif
            </div>
        </div>
    </div>
</div>
