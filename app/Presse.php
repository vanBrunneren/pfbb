<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Presse extends Model
{
    use SoftDeletes;

    protected $table = 'presse';
    protected $dates = ['deleted_at'];
}
