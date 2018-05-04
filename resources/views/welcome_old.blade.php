@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">

            <div class="panel panel-default">


                <div class="panel-body">

                    <form class="form-inline" action="/action_page.php">

                        <select type="email" class="form-control" id="party_size" >
                            <option>2 people</option>
                            <option>3 people</option>
                            <option>4 people</option>
                        </select>
                        <input type="date" class="form-control" id="party_date" value="2018-04-23">
                        <select type="email" class="form-control" id="party_size" >
                            <option>11:00 AM</option>
                            <option>11:30 AM</option>
                            <option>12:00 PM</option>
                            <option>12:30 PM</option>
                        </select>
                        <input type="input" class="form-control" id="search_crterion" size="40" placeholder="Location, Restaurant, or Cuisine"/>
                        <button type="submit" class="btn btn-primary">Find a Table</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>




@endsection
