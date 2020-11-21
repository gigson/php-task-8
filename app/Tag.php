<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = [
        'news_id',
        'name'
    ];

    public function tags(){
        return $this->belongsTo("App\News");
    }
}
