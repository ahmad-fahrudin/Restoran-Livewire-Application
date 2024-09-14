@extends('layouts.app-auth')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <h1>Verifikasi Email</h1>
                    <p>Halo, {{ $user->name }}!</p>
                    <p>Ini adalah kode verifikasi email Anda: <strong>{{ $user->verification_code }}</strong></p>
                    <p>Gunakan kode ini untuk memverifikasi email Anda.</p>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
