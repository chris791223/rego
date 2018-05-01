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