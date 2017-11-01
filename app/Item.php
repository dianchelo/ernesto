<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $table = 'items';

    public function group(){
    	return $this->belongsTo('App/Group', 'group_id');
    }
}
