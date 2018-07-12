<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jaribu extends Model
{
    //table
    protected $tableName = 'jaribu';
    //primary -- defaults id
    public $primaryKey = "jaribu_id";
    //timestamps - created_at,updated_at
    public $timestamp = true;
    //relations
}
