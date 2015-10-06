<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Day;

class PagesController extends Controller
{
	public function index()
	{
		$days = Day::first();

		//return view('pages.index', compact('days'));
		dd($days->activate_time);
	}
}
