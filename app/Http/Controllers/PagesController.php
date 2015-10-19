<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Day;
use App\foodItem;
use Carbon\Carbon;

class PagesController extends Controller
{
// LEFTOFF: I would need to split the $days collection into an array. Then I would be able to foreach through each day. And then foreach through each days' foodItems. Also maybe delete scopeEdible
	public function index()
	{
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


