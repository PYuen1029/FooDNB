<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

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

    // MUTATORS --------------------------------------------------------------

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];
    /**
     * checks if Claimed is null, if so set it to 0
     * @param int $value The claimed field's value upon setting.
     */             
    public function setClaimedAttribute($value)
    {
        if (!$value){
            $int = 0;
        }

        $this->attributes['claimed'] = $value;
    }


    // SCOPES ----------------------------------------------------------------
    public function scopeEdible($query)
    {
        // temporarily set it to Oct 7, just for testing
        $dateRef = Carbon::create(2015, 10, 7, 15);

        // change depending on far into the past you want days to be accessed
        $dateRef->subDays(7);
        $query->where('updated_at', '>', $dateRef);
    }


    // RELATIONSHIPS --------------------------------------------------
    public function day() {
        return $this->belongsTo('App\Day');
    }

    public function users()
    {
        return $this->belongsToMany('App\User')->withTimestamps();
    }
}
