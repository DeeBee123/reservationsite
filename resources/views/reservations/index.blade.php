@extends('layouts.app')
@section('content')

    <div class="card-body">
        @if ($errors->any())
            <h1 style="color: red">{{$errors->first()}}</h1>
        @endif
        <table class="table">
            <tr>
                <th>Hotel</th>
                <th>Suite</th>
                <th>Arrival date</th>
                <th>Departure date</th>
                <th>No. of Guests</th>
                <th>Price</th>
            </tr>
            @foreach ($reservations as $reservation)
                <tr>

                    <td>{{ $reservation->hotel->name }}</td>
                    <td>{{ $reservation->suite->name}}</td>
                    <td>{{ $reservation->arrival }}</td>
                    <td>{{ $reservation->departure }}</td>
                    <td>{{ $reservation->guests }}</td>
                    <td>{{ $reservation->price }} &euro;</td>
                    <td>
                        <form action={{ route('reservation.destroy', $reservation->id) }} method="POST">
                            <a href="{{ route('reservation.edit', $reservation->id) }}" class="btn btn-success">Edit</a>
                            @csrf @method('delete')
                            <input type="submit" class="btn btn-danger" value="Delete">

                        </form>
                    </td>

                </tr>
            @endforeach
        </table>
        <div>
            <a href="{{ route('reservation.create') }}" class="btn btn-success">Add</a>
        </div>
    </div>
@endsection
