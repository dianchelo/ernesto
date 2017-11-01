<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Group;

class Group extends Model
{
    protected $table = 'groups';
    var $mom, $kids;

    public function children() {
	   $children = $this->hasMany('App\Group','group_id');
	   foreach($children as $child) {
	     $child->mom = $this;
	   }
	   return $children;
	}
	public function mother() {
	 $mother = $this->hasOne('App\Group','group_id');
	  if(isset($mother->kids)) {
	    $mother->kids->merge($mother);
	  }
	  return $mother;
	}

	public function items() {
		return $this->hasMany('App\Item', 'group_id', 'id');
	}
}
