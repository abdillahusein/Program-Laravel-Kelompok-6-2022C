<!-- resources/views/Contacts/search.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Search Results</div>

                    <div class="card-body">
                        @if (count($contacts) > 0)
                            <h5>Search Results:</h5>
                            <ul>
                                @foreach ($contacts as $contact)
                                    <li>{{ $contact->first_name }} {{ $contact->last_name }}</li>
                                @endforeach
                            </ul>
                        @else
                            <p>No contacts found.</p>
                        @endif

                        <a href="{{ route('Contacts.index') }}" class="btn btn-primary">Back to Contacts</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
