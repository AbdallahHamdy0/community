<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Like;
class Post extends Model
{
    protected $fillable=[
        'title','body',
    ];

    public function comments(){
        return $this->hasMany(Comment::class);
    }
    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
        # code...
    }
}
