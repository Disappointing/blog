<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    protected $fillable = [
        'name', 'description','backimg',
    ];

    public function blogs()
    {
        return $this->hasmany(Blog::class);
    }
}
