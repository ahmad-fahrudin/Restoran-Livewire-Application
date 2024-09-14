<div>
    <div class="container-xxl py-5 bg-dark hero-header mb-5" style="margin-top: -25px">
        <div class="container text-center my-5 pt-5 pb-4">
            <h1 class="display-3 text-white mb-3 animated slideInDown">Review Booking</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center text-uppercase">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Review Booking</a></li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="container">
        <div class="col-md-12 bg-dark">
            <div class="p-5 wow fadeInUp" data-wow-delay="0.2s">
                <h5 class="section-title ff-secondary text-start text-primary fw-normal">Your</h5>
                <h1 class="text-white mb-4">Review</h1>
                <form wire:submit.prevent="submitReview" class="col-md-12">
                    <div class="row g-3">
                        <div class="">
                            <div class="form-floating">
                                <textarea class="form-control" id="review" type="text" class="form-control @error('review') is-invalid @enderror"
                                    wire:model="review" name="review" required autocomplete="review" autofocus style="height: 150px"></textarea>
                                <label for="review">Your Review</label>
                                @error('review')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <button class="btn btn-primary w-100 py-3" type="submit">Review</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>
