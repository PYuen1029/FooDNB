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

    // converts to Carbon objects
    protected $dates = ['activate_time'];

   

    /**
     * Each day has many foodItems
     * @return foodItem Returns all foodItems associated with the day
     */
    public function foodItem() {
        return $this->hasMany('App\FoodItem');
    }


    /**
     * Limits the days shown to within $numDays of today.
     * @param  $query 
     * @return null
     */
    public function scopeActive($query)
    {
        // SET TODAY'S DATE AS A REFERENCE TO AVOID INCLUDING TODAY'S LIVE ITEMS
        $dateRef = Carbon::now();

        // change depending on far into the past you want days to be accessed
        $dateRef->subDays(8);
        $query->whereBetween('activate_time', [$dateRef, Carbon::create(null, null, null, 0, 0, 0)]);
    }

    /*
     *  CONVERTS published_at ATTRIBUTE TO formattedDateString
     */
    public function getActivateTimeAttribute($date)
    {
        return Carbon::parse($date)->toFormattedDateString();
    }
}
