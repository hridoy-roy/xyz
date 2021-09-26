<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;
    protected $primaryKey = "member_id";
    function group(){
        // one to one Relation
        // return $this->hasOne('App\Models\group','group_id');
        // one to many
        return $this->hasMany('App\Models\group','group_id','group_id');
    }
}
