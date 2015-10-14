<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class foodItem extends Model
{
    // MASS ASSIGNMENT -------------------------------------------------------
    // define which attributes are mass assignable (for security)
    // we only want these 3 attributes able to be filled
    protected $fillable = array('name', 'day_id', 'quantity', 'claimed', 'claimees');

    // LINK THIS MODEL TO OUR DATABASE TABLE ---------------------------------
    // since the plural of fish isnt what we named our database table we have to define it
    protected $table = 'FoodItems';

    // allows for softDeletes (see http://laravel.com/docs/5.1/eloquent#deleting-models)
    use SoftDeletes;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];


    // DEFINE RELATIONSHIPS --------------------------------------------------
    public function day() {
        return $this->belongsTo('App\Day');
    }
}
