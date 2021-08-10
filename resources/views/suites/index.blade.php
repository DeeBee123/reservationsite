@extends('layouts.app')
@section('content')

    <div class="card-body">
        <table class="table">
            <tr>
                <th>Type</th>
            </tr>
            @foreach ($suites as $suite)
                <tr>
                    <td>{{ $suite->name }}</td>

                    <td>
                        <form action={{ route('suite.destroy', $suite->id) }} method="POST">
                            <a href="{{ route('suite.edit', $suite->id) }}" class="btn btn-success">Edit</a>
                            @csrf @method('delete')
                            <input type="submit" class="btn btn-danger" value="Delete">

                        </form>
                    </td>

                </tr>
            @endforeach
        </table>
        <div>
            <a href="{{ route('suite.create') }}" class="btn btn-success">Add</a>
        </div>
    </div>
@endsection
