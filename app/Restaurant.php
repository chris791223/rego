<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    //
    //$path = public_path('/images/restaurant-img');

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description', 'city', 'address', 'postal_code', 'cuisine_style', 'popular_menu', 'operation_from', 'operation_to', 'logo',
    ];


    public function tables(){
        return $this->hasMany('App\Table')->orderBy("table_number");
    }

    public function getLogoAttribute($value){
        $path = '/images/restaurant-img/';
        return $path . $value;
    }


}
