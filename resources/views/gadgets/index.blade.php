@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>gadgets</h1>
        <a class="btn btn-primary mb-3" href="{{ route('gadgets.create') }}">Add gadget</a>

        <table class="table">
            <thead>
                <tr>
                    <th>Image</th>
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
                        <td><img src=" {{ $gadget->photo? asset('storage/'.$gadget->photo):asset('gadget.png') }}" width="50"></td>
                        <td>{{ $gadget->client->name }}</td>
                        <td>{{ $gadget->name }}</td>
                        <td>{{ $gadget->serial_number }}</td>
                        <td>{{ $gadget->description }}</td>
                        <td>{{ $gadget->status }}</td>
                        <td>
                            @if ($gadget->is_forsale)
                                <a href="{{ route('gadgets.remove', $gadget) }}" class="btn btn-warning">Remove Sale</a>
                            @else
                                <a href="{{ route('gadgets.sale', $gadget) }}" class="btn btn-success">Sale</a>

                                @endif

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
