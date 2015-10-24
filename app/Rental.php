<?php

namespace ridbi;

use Illuminate\Database\Eloquent\Model;

class Rental extends Model
{
	public function thing()
    {
    	return $this->hasOne('ridbi\Thing');
    }

    public function owner()
    {
    	return $this->hasOne('ridbi\User', 'owner');
    }

    public function renter()
    {
    	return $this->hasOne('ridbi\User', 'renter');
    }
}
