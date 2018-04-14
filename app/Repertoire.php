<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Repertoire extends Model
{
    use SoftDeletes;

    protected $table = 'repertoire';
    protected $dates = ['deleted_at'];
}
