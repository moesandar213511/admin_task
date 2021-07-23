<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = ['id','name','list_id','detail','user_id','deadline','status'];
}
