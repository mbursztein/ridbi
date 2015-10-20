<?php

namespace ridbi;

use Illuminate\Database\Eloquent\Model;

class Thing extends Model
{

	protected $fillable = [
		'name',
		'description',
        'owner',
        'renter'
	];

    public function photos()
    {
    	return $this->hasMany('ridbi\Photo');
    }

    public function renter()
    {
        return $this->belongsTo('ridbi\User', 'renter');
    }

    public function owner()
    {
    	return $this->belongsTo('ridbi\User', 'owner');
    }

    public function ownedBy(User $user)
    {
        return $this->user_id == $user->id;
    }

    public function addPhoto(Photo $photo)
    {
    	return $this->photos()->save($photo);
    }
}
