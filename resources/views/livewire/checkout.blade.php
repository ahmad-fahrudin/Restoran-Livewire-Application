<div>
    <div class="container-xxl py-5 bg-dark hero-header mb-5" style="margin-top: -25px">
        <div class="container text-center my-5 pt-5 pb-4">
            <h1 class="display-3 text-white mb-3 animated slideInDown">Checkout</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center text-uppercase">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Checkout</a></li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="container">
        <div class="col-md-12 bg-dark">
            <div class="p-5 wow fadeInUp" data-wow-delay="0.2s">
                <h5 class="section-title ff-secondary text-start text-primary fw-normal">Reservation</h5>
                <h1 class="text-white mb-4">Checkout</h1>
                <form wire:submit.prevent="submit" class="col-md-12">
                    <div class="row g-3">
                        <div class="col-md-12">
                            <div class="form-floating">
                                <input type="text" wire:model="name" class="form-control" id="name"
                                    placeholder="Your Name">
                                <label for="name">Your Name</label>
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-floating">
                                <input type="text" wire:model="phone" class="form-control" id="phone"
                                    placeholder="Phone number">
                                <label for="phone">Phone number</label>
                                @error('phone')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-floating">
                                <textarea type="text" wire:model="notes" class="form-control" id="notes" placeholder="Notes" cols="30"
                                    rows="10"></textarea>
                                <label for="notes">Notes</label>
                                @error('notes')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-floating">
                                <input type="hidden" wire:model="price" class="form-control" id="price">
                            </div>
                        </div>
                        <div class="col-12">
                            <button class="btn btn-primary w-100 py-3" type="submit">Order and Pay Now</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
