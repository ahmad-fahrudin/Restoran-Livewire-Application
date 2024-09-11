<div>
    <form wire:submit.prevent="submit">
        <div class="row g-3">
            <!-- Nama -->
            <div class="col-md-6">
                <div class="form-floating">
                    <input wire:model="name" type="text" class="form-control @error('name') is-invalid @enderror"
                        id="name" placeholder="Your Name">
                    @error('name')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                    <label for="name">Your Name</label>
                </div>
            </div>

            <!-- Telepon -->
            <div class="col-md-6">
                <div class="form-floating">
                    <input wire:model="phone" type="text" class="form-control @error('phone') is-invalid @enderror"
                        id="phone" placeholder="Phone">
                    @error('phone')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                    <label for="phone">Your Phone</label>
                </div>
            </div>

            <!-- Tanggal & Waktu -->
            <div class="col-md-6">
                <div class="form-floating">
                    <input wire:model="date" type="datetime-local"
                        class="form-control @error('datetime') is-invalid @enderror" id="datetime"
                        placeholder="Date & Time" />
                    @error('datetime')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                    <label for="datetime">Date & Time</label>
                </div>
            </div>


            <!-- Jumlah Orang -->
            <div class="col-md-6">
                <div class="form-floating">
                    <input wire:model="jumlah_orang" type="number"
                        class="form-control @error('jumlah_orang') is-invalid @enderror" id="jumlah_orang"
                        placeholder="People">
                    @error('jumlah_orang')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                    <label for="jumlah_orang">People</label>
                </div>
            </div>

            <!-- Permintaan Khusus -->
            <div class="col-12">
                <div class="form-floating">
                    <textarea wire:model="notes" class="form-control @error('notes') is-invalid @enderror" placeholder="Special Request"
                        id="message" style="height: 100px"></textarea>
                    @error('notes')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                    <label for="message">Special Request</label>
                </div>
            </div>

            <!-- Harga DP -->
            <h4 class="text-white mb-4">Down Payment Rp.50.000</h4>

            <!-- Tombol Submit -->
            <div class="col-12">
                <button class="btn btn-primary w-100 py-3" type="submit">Book Now</button>
            </div>
        </div>
    </form>
</div>
