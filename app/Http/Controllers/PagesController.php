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
		$dayCheck = Carbon::create(null, null, null, 19, 0, 0);

		// check and set if today is already a Day on the database
		if ($liveDay = Day::with('foodItem')->where('activate_time', "=", $dayCheck)->get()) {}

		// ELSE IF CHECK IF TODAY IS A "LIVE DAY" AND CREATE A DAY, change the date after finished developing
		else if ($dayCheck->dayOfWeek == Carbon::THURSDAY) {
			$liveDay = Day::create(array(
				'activate_time' => $dayCheck
				));
			$liveDay->save();
			$liveDay->get();
		}		

		// sets $activeDays to any Day with foodItems that is active, ordered from most recent to latest
		$activeDays = Day::with('foodItem')->active()->orderBy('activate_time', 'DESC')->get();
		
		dd(compact('activeDays', 'liveDay', 'dayCheck'), $dayCheck->dayOfWeek);

		return view('pages.index', compact('activeDays', 'liveDay'));
		
	}

	public function showDay($id)
	{
		$day = Day::with('foodItem')->findOrFail($id);

		return view('pages.showDay', compact('day'));
	}
}




