<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Customers extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = "customers";
    protected $primaryKey = "customer_id";


    public function setDobAttribute($value){
        $this->attributes['dob'] = date("y-m-d",strtotime($value));
    }
    public function getNameAttribute($value){
        return ucfirst($value);
    }
        
}
