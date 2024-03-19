{{-- resources/views/addresses/index.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Daftar Alamat</h1>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Street</th>
                <th>City</th>
                <th>Province</th>
                <th>Country</th>
                <th>Postal Code</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($addresses as $address)
            <tr>
                <td>{{ $address->id }}</td>
                <td>{{ $address->street }}</td>
                <td>{{ $address->city }}</td>
                <td>{{ $address->province }}</td>
                <td>{{ $address->country }}</td>
                <td>{{ $address->postal_code }}</td>
                <td>
                    <a href="{{ route('addresses.show', $address->id) }}" class="btn btn-info">View</a>
                    <a href="{{ route('addresses.edit', $address->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('addresses.destroy', $address->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
