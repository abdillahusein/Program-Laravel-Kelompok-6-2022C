{{-- resources/views/addresses/show.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detail Alamat</h1>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $address->street }}</h5>
            <p class="card-text">City: {{ $address->city }}</p>
            <p class="card-text">Province: {{ $address->province }}</p>
            <p class="card-text">Country: {{ $address->country }}</p>
            <p class="card-text">Postal Code: {{ $address->postal_code }}</p>
            <a href="{{ route('addresses.index') }}" class="btn btn-primary">Back to list</a>
        </div>
    </div>
</div>
@endsection
