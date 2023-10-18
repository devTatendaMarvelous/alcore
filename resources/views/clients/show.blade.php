@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Client Details</h1>
        <table class="table">
            <tbody>
                <tr>
                    <th>Name</th>
                    <td>{{ $client->name }}</td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td>{{ $client->email }}</td>
                </tr>
                <tr>
                    <th>Phone</th>
                    <td>{{ $client->phone }}</td>
                </tr>
                <tr>
                    <th>Address</th>
                    <td>{{ $client->address }}</td>
                </tr>
            </tbody>
        </table>
        <a href="{{ route('clients.edit', $client) }}" class="btn btn-primary">Edit</a>
        <form action="{{ route('clients.destroy', $client) }}" method="POST" class="d-inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger"
                onclick="return confirm('Are you sure you want to delete this client?')">Delete</button>
        </form>
    </div>
@endsection
