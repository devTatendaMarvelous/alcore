@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>gadgets</h1>
        <a class="btn btn-primary mb-3" href="{{ route('gadgets.create') }}">Add gadget</a>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <table class="table">
            <thead>
                <tr>
                    <th>Client</th>
                    <th>Gadget</th>
                    <th>Serial Number</th>
                    <th>Description</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($gadgets as $gadget)
                    <tr>
                        <td>{{ $gadget->client->name }}</td>
                        <td>{{ $gadget->name }}</td>
                        <td>{{ $gadget->serial_number }}</td>
                        <td>{{ $gadget->description }}</td>
                        <td>{{ $gadget->status }}</td>
                        <td>

                            <a href="{{ route('gadgets.edit', $gadget) }}" class="btn btn-primary">Edit</a>
                            <form action="{{ route('gadgets.destroy', $gadget) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this gadget?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
