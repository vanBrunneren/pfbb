<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Links extends Model
{
    use SoftDeletes;
	
    protected $table = 'links';
    protected $dates = ['deleted_at'];
}
