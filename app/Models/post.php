<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    use HasFactory;
    protected $appends = ["tags","date"];


    public function files() {
        return $this->hasMany('App\Models\files','type_id','id')->where("type","2")->orderBy('sort') ;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(category::class);
    }
    public function brandtext()
    {
        return $this->belongsTo(category::class,"brand","id");
    }
    public function getTagsAttribute()
    {
        return explode(",",$this->tag);
    }
    public function getDateAttribute()
    {
        return date("F j, Y, g:i a", strtotime($this->publish_time));
    }
}
