<?php

namespace App;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;
use Auth;

class foodItem extends Model
{
    // MASS ASSIGNMENT -------------------------------------------------------
    // define which attributes are mass assignable (for security)
    // we only want these 3 attributes able to be filled
    protected $fillable = array('name', 'day_id', 'quantity', 'claimed');

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

    public function sufficientQuantity(Request $request)
    {
        // check if $request->claimed exists to know it's a claim update
        if (isset($request->claimed)){

            // if so, find difference between $request->claimed and $food->claimed
            $diff = $request->claimed - $this->claimed;
            
            // if $diff is positive or zero that means foodItems were claimed or nothing was done
            if ($diff >= 0){
                // do some error checking to make sure quantity is great enough
                if($diff <= $this->quantity){
                    // subtract that difference to quantity
                    $this->quantity -= $diff;
                }

                // ELSE QUANTITY IS TOO SMALL, RETURN BACK WITH FLASH MESSAGE
                else {
                    return back()->with([
                        'flash_message' => "There was not enough $this->name available. Please lower the claimed quantity.",
                        'flash_level' => "danger"
                    ]);
                }
            }

            // if $diff is negative that means foodItems were unclaimed
            else if ($diff < 0){
                // add $diff to quantity 
                $this->quantity += abs($diff);

                $this->save();

            }

            // either way attach current foodItem to current user
            Auth::User()->foodItems()->attach($this);

            return $this;

        }
    }
}
