<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Day extends Model
{
     // MASS ASSIGNMENT -------------------------------------------------------
    // define which attributes are mass assignable (for security)
    // we only want these 3 attributes able to be filled
    protected $fillable = array('activate_time');

    // LINK THIS MODEL TO OUR DATABASE TABLE ---------------------------------
    // since the plural of fish isnt what we named our database table we have to define it
    protected $table = 'days';

    // DEFINE RELATIONSHIPS --------------------------------------------------
    public function day() {
        return $this->hasMany('App\FoodItem');
    }

    // converts activate_time to Carbon object
    protected $dates = ['activate_time'];

    public function scopeActive($query)
    {
        $dateRef = Carbon::now();
        $dateRef->subDays(7);
        $query->whereBetween('activate_time', [$dateRef, Carbon::now()]);
    }
}
