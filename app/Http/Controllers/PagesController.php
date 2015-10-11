<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Day;
use Carbon\Carbon;

class PagesController extends Controller
{
	public function index()
	{
		$days = Day::latest()->active()->orderBy('activate_time', 'DESC')->with('foodItem')->get();

		return view('pages.index', compact('days'));
		
	}

	public function showDay($id)
	{
		$day = Day::findOrFail($id);

		return view('pages.showDay', compact('day'));
	}
}

//////////////


