@extends('layouts.admin')

@section('content')

    <table class="table table-striped">
        <thead>
        <tr>
            <th>{{__('admin.rest_name')}}</th>
            <th>{{__('admin.city')}}</th>
            <th>{{__('admin.address')}}</th>
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
        <button type="sumbit" class="btn btn-default">{{__('admin.create_new_rest')}}</button>
    </form>


@endsection