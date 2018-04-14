<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Videos extends Model
{
    use SoftDeletes;

    protected $table = 'videos';
    protected $dates = ['deleted_at'];
}
