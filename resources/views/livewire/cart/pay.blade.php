<div>
    <div class="container-xxl py-5 bg-dark hero-header mb-5" style="margin-top: -25px">
        <div class="container text-center my-5 pt-5 pb-4">
            <h1 class="display-3 text-white mb-3 animated slideInDown">Payment Foods</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center text-uppercase">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Payment Foods</a></li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="container">
        <div style="text-align: center;">
            <button type="button" class="btn btn-lg btn-primary waves-effect waves-light text-center">
                <li class="fas fa-dollar-sign "></li>
                <a id="pay-button">
                    Payment Now
                </a>
            </button>
        </div>

    </div>
    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ env('MIDTRANS_CLIENT_KEY') }}"></script>
    <script type="text/javascript">
        document.getElementById('pay-button').onclick = function() {
            // SnapToken acquired from previous step
            snap.pay('{{ $snapToken }}', {
                // Optional
                onSuccess: function(result) {
                    // Call Livewire method to update status in database
                    @this.call('updateStatus');
                },
                // Optional
                onPending: function(result) {
                    document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                },
                // Optional
                onError: function(result) {
                    document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                }
            });
        };
    </script>

</div>
