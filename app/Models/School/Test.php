<?php

namespace App\Models\School;

use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    protected $table        = 'test';
    protected $fillable     = ['name' ];
    public static $rules 	= [
        'name' 				=> 'required|max:227',   
    ]; 
}
