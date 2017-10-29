<?php

namespace App\Http\Controllers;

class PagesController extends Controller {
	public function getExample() {
		return view('pages.example');
	}
	
}