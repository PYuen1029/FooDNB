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
		$days = Day::latest()->active()->orderBy('activate_time')->get()->toArray();

		return view('pages.index')->with($days);
		
	}
}
