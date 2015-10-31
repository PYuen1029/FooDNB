<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Day;
use App\foodItem;
use Carbon\Carbon;
use Auth;

class PagesController extends Controller
{
	public function __construct()
    {
         $this->middleware('auth',['except' => 'index']);
    }

	public function index()
	{
		if(!Auth::check()) {
			return view('pages.guestIndex');

		}

		// create a Carbon object for today at 7pm
		$dayCheck = Carbon::create(null, null, null, 19);

		// check and set if today is already a Day on the database
		if (Day::with('foodItem')->where('activate_time', "=", $dayCheck)->exists()) {
			
			$liveDay = Day::with('foodItem')->where('activate_time', "=", $dayCheck)->first();
		}

		// ELSE IF CHECK IF TODAY IS A "LIVE DAY" AND CREATE A DAY, change the date after finished developing
		else if (($dayCheck->dayOfWeek === Carbon::MONDAY) || ($dayCheck->dayOfWeek === Carbon::WEDNESDAY) || ($dayCheck->dayOfWeek === Carbon::FRIDAY) || ($dayCheck->dayOfWeek === Carbon::SATURDAY)) {
			
			$liveDay = Day::create(array('activate_time' => $dayCheck));
			
			$liveDay->save();

			$liveDay->first();

		}

		// DELETES $liveDay IF IT IS BEFORE 7PM (THE START TIME)
		if ($dayCheck->gte(Carbon::now())){
			if (isset($liveDay)){
				unset($liveDay);
			}
				
		}

		// sets $activeDays to any Day with foodItems that is active, ordered from most recent to latest
		$activeDays = Day::with('foodItem')->active()->orderBy('activate_time', 'DESC')->get();

		return view('pages.index', compact('activeDays', 'liveDay'));
		
	}

	public function showDay($id)
	{
		$day = Day::with('foodItem')->findOrFail($id);

		return view('pages.showDay', compact('day'));
	}
}




