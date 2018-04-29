<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Table extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'restaurant_id', 'table_number', 'number_of_person', 'seating_type_id', 'is_available', 'at_smoking_area',
    ];

    //
    public function seating_type(){
        return $this->belongsTo("App\SeatingType");
    }


}
