<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class BlogPost extends Model
{
    use HasFactory;

//----------fillable allows us to access the database table columns. 
//this is mandatory in order to access our database

    protected $fillable = [
        'title',
        'body',
        'user_id'
    ];


    public function blogHasUser(){

        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }

    public function selectUser(){
        return $this->select(DB::raw('concact(firstname,"-",lastName) as name'))
        ->join("users", "user.id", "-", "user_id")
        ->get();
    }

}
