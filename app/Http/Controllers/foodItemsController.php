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
    public function store(Requests\foodItemRequest $request, $dayID)
    {

        // SET CLAIMED TO 0 WHEN IT IS CREATED

        $request['claimed'] = 0;

        $dayinput = Day::findOrFail($dayID)->foodItem()->create($request->all())->save();

        // RETURN BACK WITH A CREATED NEW FOODITEM SUCCESS FLASH MESSAGE
        return back()->with([
            'flash_message' => "The leftover food item was added.",
            'flash_level' => "success"
            ]);
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

        /* probably going to be like: 
        new foodItem = foodItem::findOrFail($foodID);
        and then call 
        
         */ 


        $food = foodItem::findOrFail($foodID)->sufficientQuantity($request);

        $food->update($request->all());

        return back()->with([
            'flash_message' => "The $food->name was updated.",
            'flash_level' => "success"
            ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($dayID, $foodID)
    {
        $food = foodItem::findOrFail($foodID)->name;

        $destroy = foodItem::findOrFail($foodID);
        
        $destroy->delete();

        return back()->with([
            'flash_message' => "The leftover $food item was deleted.",
            'flash_level' => "warning"
            ]);
    }
}
