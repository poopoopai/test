<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class UserPermission extends Model
{
    protected $fillable = ['user_funcuton', 'read' , 'write', 'execute'];
}
