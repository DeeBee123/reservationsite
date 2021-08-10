@extends('layouts.app')
@section('content')

    <div class="card-body">
        <table class="table">
            <tr>
                <th>Hotel</th>
            </tr>
            @foreach ($hotels as $hotel)
                <tr>
                    <td>{{ $hotel->name }}</td>
                    <td>
                        <form action={{ route('hotel.destroy', $hotel->id) }} method="POST">
                            <a href="{{ route('hotel.edit', $hotel->id) }}" class="btn btn-success">Edit</a>
                            @csrf @method('delete')
                            <input type="submit" class="btn btn-danger" value="Delete">

                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
        <div>
            <a href="{{ route('hotel.create') }}" class="btn btn-success">Add</a>
        </div>
    </div>
@endsection
