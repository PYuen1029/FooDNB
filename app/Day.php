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
    public function foodItem() {
        return $this->hasMany('App\FoodItem');
    }

    // converts activate_time to Carbon object
    protected $dates = ['activate_time'];

    /**
     * Limits the days shown to within $numDays of today.
     * @param  $query 
     * @return null
     */
    public function scopeActive($query)
    {
        // temporarily set it to Oct 7, just for testing
        $dateRef = Carbon::create(2015, 10, 7, 15);

        // change depending on far into the past you want days to be accessed
        $dateRef->subDays(14);
        $query->whereBetween('activate_time', [$dateRef, Carbon::now()]);
    }

    /*
     *  CONVERTS published_at ATTRIBUTE TO formattedDateString
     */
    public function getActivateTimeAttribute($date)
    {
        return Carbon::parse($date)->toFormattedDateString();
    }
}
