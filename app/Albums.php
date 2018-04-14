<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Albums extends Model
{
	use SoftDeletes;
	
    protected $table = 'gallery_images_albums';
    protected $dates = ['deleted_at'];
}
