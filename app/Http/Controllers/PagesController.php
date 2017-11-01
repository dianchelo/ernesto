<?php

namespace App\Http\Controllers;

use App\Group;
use App\Item;

use Illuminate\Support\Facades\DB;

class PagesController extends Controller {
	public function getErnesto() {

		$listGroups = Group::all();
		$groups = Group::where('group_id', '=', NULL)->get();
		$items = Item::where('group_id', '=', NULL)->get();
 
		return view('ernesto')->withGroups($groups)->withListGroups($listGroups)->withItems($items);
	}
}