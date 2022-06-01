<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class banner extends Model
{
    use HasFactory;
    public function files() {
        return $this->hasMany('App\Models\files','type_id','id')->where("type","3")->orderBy('sort') ;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
