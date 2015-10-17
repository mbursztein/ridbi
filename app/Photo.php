<?php

namespace ridbi;

use Illuminate\Database\Eloquent\Model;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class Photo extends Model
{

	protected $table = 'thing_photos';

	protected $fillable = ['photo'];

	protected $baseDir = 'things/photos';

    public function Thing()
    {
    	return $this>belongsTo('ridbi\Thing');
    }

    public static function fromForm(UploadedFile $file)
    {
    	$photo = new static;
    	$name = time() . $file->getClientOriginalName();
    	$photo->path = $photo->baseDir . '/' . $name;
    	$file->move($photo->baseDir, $name);
    	return $photo;
    }
}
