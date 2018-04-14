<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GalleryImages extends Model
{
    use SoftDeletes;
	
    protected $table = 'gallery_images';
    protected $dates = ['deleted_at'];
}
