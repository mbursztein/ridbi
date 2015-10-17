<?php

namespace ridbi;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{

	protected $table = 'thing_photos';

	protected $fillable = ['photo'];

    public function Thing()
    {
    	return $this>belongsTo('ridbi\Thing');
    }
}
