<?php

namespace ridbi;

use Illuminate\Database\Eloquent\Model;

class Thing extends Model
{

	protected $fillable = [
		'name',
		'description'
	];

    public function photos()
    {
    	return $this->hasMany('ridbi\Photo');
    }
}
