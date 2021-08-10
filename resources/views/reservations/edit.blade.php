@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="card-body">
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                        <form action="{{route('reservation.update', $reservation->id)}}" method="POST">
                        @csrf @method("PUT")
                        <div class="form-group">
                            <label>Hotel:</label>
                            <select name="hotel_id" id="" class="form-control">
                                @foreach ($hotels as $hotel)
                                   <option value="{{$hotel->id}}" @if ($hotel->id == $reservation->hotel_id) selected="selected"
                                   @endif>{{$hotel->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Suite:</label>
                            <select name="suite_id" id="" class="form-control">
                                @foreach ($suites as $suite)
                                   <option value="{{$suite->id}}" @if ($suite->id == $reservation->suite_id) selected="selected"
                                   @endif>{{$suite->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Arrival date:</label>
                            <input type="date" name="arrival" class="form-control" value="{{$reservation->arrival }}">
                        </div>
                        <div class="form-group">
                            <label>Departure date:</label>
                            <input type="date" name="departure" class="form-control" value="{{$reservation->departure}}">
                        </div>
                        <div class="form-group">
                            <label>No. of Guests:</label>
                            <input type="number" name="guests" class="form-control" value="{{$reservation->guests}}">
                        </div>
                        <div class="form-group">
                            <label>Price:</label>
                            <input type="number" name="price" class="form-control" value="{{$reservation->price}}">
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
