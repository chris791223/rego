@extends('layouts.admin')

@section('content')

    <table class="table table-striped">
        <thead>
        <tr>
            <th>Restaurant Name</th>
            <th>City</th>
            <th>Address</th>
        </tr>
        </thead>
        <tbody>
        @foreach($restaurants as $restaurant )
            <tr>
                <td>{{$restaurant->name}}</td>
                <td>{{$restaurant->city}}</td>
                <td>{{$restaurant->address}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <form method="get" action="\admin\restaurants\create">
        <button type="button" class="btn btn-default">Default</button>
    </form>


@endsection