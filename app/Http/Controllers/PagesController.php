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

		$days = Day::with('foodItem')->active()->orderBy('activate_time', 'DESC')->get();

		return view('pages.index', compact('days'));
		
	}

	public function showDay($id)
	{
		$day = Day::with('foodItem')->findOrFail($id);

		return view('pages.showDay', compact('day'));
	}
}

//////////////


