<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class ProjSkill extends Model
{
    protected $table='projskills';
        use SoftDeletes;

}
