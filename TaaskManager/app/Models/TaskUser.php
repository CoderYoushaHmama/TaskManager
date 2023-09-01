<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class TaskUser extends Authenticatable
{
    use HasFactory;
    protected $table = 'users';
    protected $fillable = [
        'name','email','password','user_id'
    ];
    public $timestamps = false;

    function tasks(){
        return $this->hasMany('tasks','user_id','id');
    }
}
