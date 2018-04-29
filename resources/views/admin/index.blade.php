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
            <td><a href="/admin/restaurants/{{$restaurant->id}}/edit"> {{$restaurant->name}}</a></td>
            <td><a href="/admin/restaurants/{{$restaurant->id}}/edit">{{$restaurant->city}}</a></td>
            <td><a href="/admin/restaurants/{{$restaurant->id}}/edit">{{$restaurant->address}}</a></td>
        </tr>
        @endforeach
        </tbody>
    </table>

    <form method="get" action="/admin/restaurants/create">
        <button type="sumbit" class="btn btn-default">Create New Restaurant</button>
    </form>


@endsection