<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bookmark extends Model
{
    protected $fillable = [
        'id', 'user_id', 'name','url','description',
    ];

    protected $hidden = [
        'created_at', 'updated_at',
    ];
}
