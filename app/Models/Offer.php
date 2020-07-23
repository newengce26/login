<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    // model is identical to database table with the same name of model: Offer=>offers 
    //if your table is not named the same as your Model then do the following"
    protected $table = 'offers';  //'my-offers';

    //other properties
    protected $fillable = ['name','price','details','created_at','updated_at'];
    protected $hidden   = ['created_at','updated_at'];

    public $timestamps = false;

}
