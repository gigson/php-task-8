<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $fillable = [
        'title',
        "desc",
        "short_desc",
        "image",
        "published_time",
        "user_id",
        "category_id"
    ];

}
