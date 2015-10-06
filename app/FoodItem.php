<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FoodItem extends Model
{
    // MASS ASSIGNMENT -------------------------------------------------------
    // define which attributes are mass assignable (for security)
    // we only want these 3 attributes able to be filled
    protected $fillable = array('name', 'day_id', 'quantity', 'claimed', 'claimees');

    // LINK THIS MODEL TO OUR DATABASE TABLE ---------------------------------
    // since the plural of fish isnt what we named our database table we have to define it
    protected $table = 'FoodItems';

    // DEFINE RELATIONSHIPS --------------------------------------------------
    public function day() {
        return $this->belongsTo('App\Day');
    }
}
