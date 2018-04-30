<?php

namespace App\Http\Controllers;

use App\Table;
use App\Restaurant;
use App\SeatingType;
use Illuminate\Http\Request;

class AdminRestaurantTablesController extends Controller
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
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function updateAll(Request $request)
    {
        // get total number of records
        $number_of_record = $request->number_of_record;

        // get restaurant id
        $restaurant_id = $request->restaurant_id;

        for ($idx = 0; $idx < $number_of_record; $idx++) {
            $v_name = "table_id" . $idx;
            $table_id = $request->$v_name;
            $table = Table::findOrFail($table_id);

            $v_name = "delete_flag" . $idx;
            $delete_flag = $request->$v_name;

            // update
            if ($delete_flag != 1) {
                // get table number
                $v_name = "table_number" . $idx;
                $table_number = $request->$v_name;
                // get number_of_person
                $v_name = "number_of_person" . $idx;
                $number_of_person = $request->$v_name;
                // get seating_type_id
                $v_name = "seating_type" . $idx;
                $seating_type_id = $request->$v_name;
                // get is_available
                $v_name = "is_available" . $idx;
                $is_available = $request->$v_name;
                // get at_smoking_area
                $v_name = "smoking_area" . $idx;
                $at_smoking_area = $request->$v_name;

                $table->update(['restaurant_id' => $restaurant_id, 'table_number' => $table_number,
                    'number_of_person' => $number_of_person, 'seating_type_id' => $seating_type_id,
                    'is_available'=>$is_available, 'at_smoking_area'=>$at_smoking_area]);
            } // delete
            else {
                $table->delete();
            }
        }

        $restaurant = Restaurant::findOrFail($restaurant_id);
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
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function insertAll(Request $request)
    {
        // get total number of records
        $number_of_record = $request->number_of_record;

        // get restaurant id
        $restaurant_id = $request->restaurant_id;

        for ($idx = 0; $idx < $number_of_record; $idx++) {
            $v_name = "delete_flag" . $idx;
            $delete_flag = $request->$v_name;

            // insert
            if ($delete_flag != 1) {

                // get table number
                $v_name = "table_number" . $idx;
                $table_number = $request->$v_name;
                // get number_of_person
                $v_name = "number_of_person" . $idx;
                $number_of_person = $request->$v_name;
                // get seating_type_id
                $v_name = "seating_type" . $idx;
                $seating_type_id = $request->$v_name;
                // get is_available
                $v_name = "is_available" . $idx;
                $is_available = $request->$v_name;
                // get at_smoking_area
                $v_name = "smoking_area" . $idx;
                $at_smoking_area = $request->$v_name;

                Table::create(['restaurant_id' => $restaurant_id, 'table_number' => $table_number,
                    'number_of_person' => $number_of_person, 'seating_type_id' => $seating_type_id,
                    'is_available'=>$is_available, 'at_smoking_area'=>$at_smoking_area]);
            }
        }

        $restaurant = Restaurant::findOrFail($restaurant_id);
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
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
