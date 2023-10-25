@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Add Client</h1>
        <form action="{{ route('gadgets.update',[$gadget->id]) }}" method="POST" class="row" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="mb-3 col-md-6">
                <label for="name" class="form-label">Client</label>
                <select class="form-select" name="client_id">
                    <option value="{{ $gadget->client->id}}">{{$gadget->client->name}}</option>
                    @foreach($clients as $client)
                        <option value="{{ $client->id}}">{{$client->name}}</option>
                        @endforeach
                </select>

            </div>
            <div class="mb-3 col-md-6">
                <label for="name" class="form-label">Client</label>
                <select class="form-select" name="status">
                    <option value="{{ $gadget->status}}">{{$gadget->status}}</option>
                    <option value="pending">Pending</option>
                    <option value="in_progress">In Progress</option>
                    <option value="testing">Testing</option>
                    <option value="waiting_approval">Waiting Approval</option>
                    <option value="completed">Completed</option>
                    <option value="collected">Collected</option>
                </select>

            </div>
            <div class="mb-3 col-md-6">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name"  value="{{$gadget->name}}" required>
            </div>
            <div class="mb-3 col-md-6">
                <label for="email" class="form-label">Serial Number</label>
                <input  class="form-control" id="email" name="serial_number" value="{{$gadget->serial_number}}" required>
            </div>
            <div class="mb-3 col-md-6">
                <label for="photo" class="form-label">Gadget Photo</label>
                <input type="file" accept="image/*"  class="form-control" id="photo" name="photo" >
            </div>
            <div class="mb-3 col-md-6">
                <label for="address" class="form-label">Description</label>
                <textarea class="form-control" id="address" name="description" rows="3" required>{{$gadget->description}}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
@endsection
