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
        @if (session()->has('success'))
            <p class="alert alert-success">{{ session('success') }}</p>
        @endif
    </div>

    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5 align-items-center">
                <div class="col-md-6">
                    <div class="row g-3">
                        <div class="col-12 text-start">
                            <img class="img-fluid rounded w-100 wow zoomIn" data-wow-delay="0.1s"
                                src="{{ asset($foodItem->image) }}">
                        </div>

                    </div>
                </div>
                <div class="col-lg-6">
                    <h1 class="mb-4">{{ $foodItem->name }}</h1>
                    <p class="mb-4">
                        {{ $foodItem->description }}
                    </p>
                    <div class="row g-4 mb-4">
                        <div class="col-sm-6">
                            <div class="d-flex align-items-center border-start border-5 border-primary px-3">
                                <h3> Rp{{ number_format($foodItem->price, 0, ',', '.') }}</h3>
                            </div>
                        </div>

                    </div>
                    @auth
                        <form>
                            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                            <input type="hidden" name="foods_id" value="{{ $foodItem->id }}">
                            <input type="hidden" name="name" value="{{ $foodItem->name }}">
                            <input type="hidden" name="image" value="{{ $foodItem->image }}">
                            <input type="hidden" name="price" value="{{ $foodItem->price }}">
                            <div>
                                @if ($cartVerifing > 0 || $submit)
                                    <button class="btn btn-primary py-3 px-5 mt-2" disabled>Added to Cart</button>
                                @else
                                    <button wire:click.prevent="addToCart" class="btn btn-primary py-3 px-5 mt-2">Add to
                                        Cart</button>
                                @endif
                            </div>
                        </form>
                    @else
                        <p class="alert alert-success">Login to add this product to cart</p>
                    @endauth

                </div>
            </div>
        </div>
    </div>
</div>
