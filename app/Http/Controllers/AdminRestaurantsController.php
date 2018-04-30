<?php

namespace App\Http\Controllers;

use App\Restaurant;
use App\SeatingType;
use Illuminate\Http\Request;


class AdminRestaurantsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $restaurants = Restaurant::all();
        return view('admin.restaurants.create', compact('restaurants'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        // confirm if file exists
        if ($request->hasFile('logo_image')) {
            // get file
            $image = $request->file('logo_image');
            // set new image file
            $name = md5(time()).random_int(5,5).'.'.$image->getClientOriginalExtension();
            // set directory
            $destination_path = public_path('/images/restaurant-img');
            // move file to directory
            $image->move($destination_path, $name);

            // set new image file name
            $request->merge(["logo"=>$name]);
        }


        Restaurant::create($request->all());
        $restaurants = Restaurant::all();
        return view('admin.index', compact('restaurants'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $restaurant = Restaurant::findOrFail($id);
        $restaurants = Restaurant::all();
        $seating_types = SeatingType::all();
        $tables = $restaurant->tables;

        // get max table_number
        if (count($tables) > 0) {
            $max_table_number = $tables->last()->table_number;
        }else{
            $max_table_number = 0;
        }

        return view('admin.restaurants.edit', compact('restaurant', 'restaurants', 'seating_types', 'tables', 'max_table_number'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $restaurant = Restaurant::findOrFail($id);

        // confirm if file exists
        if ($request->hasFile('logo_image')) {
            // get file
            $image = $request->file('logo_image');
            // set new image file
            $name = md5(time()).random_int(5,5).'.'.$image->getClientOriginalExtension();
            // set directory
            $destination_path = public_path('/images/restaurant-img');
            // move file to directory
            $image->move($destination_path, $name);

            // set new image file name
            $request->merge(["logo"=>$name]);
        }

        $restaurant->update($request->all());

        $restaurants = Restaurant::all();
        return view('admin.index', compact('restaurants'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $restaurant = Restaurant::findOrFail($id);
        $restaurant->delete();

        $restaurants = Restaurant::all();
        return view('admin.index', compact('restaurants'));

    }
}
