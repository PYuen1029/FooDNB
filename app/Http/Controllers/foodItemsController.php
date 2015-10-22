<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Day;
use App\FoodItem;
use App\User;
use Auth;

class foodItemsController extends Controller
{
    // MIDDLEWARE==========================================
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $dayID)
    {
        // set claimed to 0 when it is created

        $request['claimed'] = 0;

        $dayinput = Day::findOrFail($dayID)->foodItem()->create($request->all())->save();

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $dayID, $foodID)
    {

        $food = Day::findOrFail($dayID)->foodItem()->findOrFail($foodID);

        // check if $request->claimed exists
        if ($rqstClm = $request->claimed){

            // if so, find difference between $request->claimed and $food->claimed
            $diff = $rqstClm - $food->claimed;

            // if $diff is positive or zero that means foodItems were claimed or nothing was done
            if ($diff >= 0){
                // do some error checking to make sure quantity is great enough
                if($diff <= $food->quantity){
                    // subtract that difference to quantity
                    $food->quantity -= $diff;
                }

                // else quantity is too small, return back (and probably include a flash msg)
                else {
                    return back();
                }
            }

            // if $diff is negative that means foodItems were unclaimed
            else if ($diff < 0){
                // add $diff to quantity 
                $food->quantity += abs($diff);
            }
            

            // either way attach current foodItem to current user
            Auth::User()->foodItems()->attach($food);

        }

        $food->update($request->all());

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($dayID, $foodID)
    {
        $destroy = foodItem::findOrFail($foodID);
        
        $destroy->delete();

        return back();
    }
}
