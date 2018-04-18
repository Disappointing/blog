<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    //
    protected $fillable=['content','pid','blog_id','email'];

    public function parent()
    {
        return $this->hasOne(get_class($this),'pid');
    }

    public function children()
    {
        return $this->hasMany(get_class($this), 'pid', 'id');
    }


    public function blog()
    {
        return $this->belongsTo(Blog::class);
    }


}
