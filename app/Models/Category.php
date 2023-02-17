<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Category extends Model
{

    use HasFactory;

    protected $table = 'categories';


    static public function selectCategorie(){

        $lang = session()->get('localeDB');

        if (session()->has('locale') && session()->get('locale')=="fr"):
            $lang = '_fr;';
        endif;

        // if (session()->has('locale') && session()->get('locale')=="fr"):
        //     $lang = '_sp;';
        // endif;

        $query = Category::select('id',
        DB::raw("(case when categorie$lang is null then categories else categorie$lang end) as categories" )
        )   
                -> orderby('categorie')
                ->get();
                return $query;
    }



    //select id, (case when categorie is null )


}
