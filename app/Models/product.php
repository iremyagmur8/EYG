<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class product extends Model
{
    use HasFactory;

    public function files() {
        return $this->hasMany('App\Models\files','type_id','id')->where("type","5")->orderBy('sort') ;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function category()
    {
        return $this->belongsTo(category::class);
    }
    public function colorProduct()
    {
        return $this->hasOne(category::class,"id","color");
    }

    public function child()
    {
        return $this->hasMany('App\Models\product', 'productcode','productcode');


    }
}
