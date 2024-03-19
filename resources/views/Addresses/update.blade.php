@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Ubah Alamat</h1>
        <form action="{{ route('Addresses.update', $address->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="street">Street:</label>
                <input type="text" class="form-control" id="street" name="street" value="{{ $address->street }}" required>
            </div>
            <div class="form-group">
                <label for="city">City:</label>
                <input type="text" class="form-control" id="city" name="city" value="{{ $address->city }}" required>
            </div>
            <div class="form-group">
                <label for="province">Province:</label>
                <input type="text" class="form-control" id="province" name="province" value="{{ $address->province }}" required>
            </div>
            <div class="form-group">
                <label for="country">Country:</label>
                <input type="text" class="form-control" id="country" name="country" value="{{ $address->country }}" required>
            </div>
            <div class="form-group">
                <label for="postal_code">Postal Code:</label>
                <input type="text" class="form-control" id="postal_code" name="postal_code" value="{{ $address->postal_code }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('Addresses.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
@endsection
