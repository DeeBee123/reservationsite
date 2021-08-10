@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="card-body">
                        @error('name')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                        <form action="{{route('hotel.update', $hotel->id)}}" method="POST">
                        @csrf @method("PUT")
                        <div class="form-group">
                            <label>Name:</label>
                            <input type="text" name="name" class="form-control" value="{{$hotel->name}}">
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
