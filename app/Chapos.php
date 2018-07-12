<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chapos extends Model
{
    //specify the table
    protected $table = 'chapos';
    //primary key
    public $primaryKey = 'chapo_id';
}
