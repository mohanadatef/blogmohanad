<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'description','photos','like','hashtag'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $table = 'blogs';
    public $timestamps = true;
    public function comment()
    {
        return $this->hasMany('App\CommentBlog');
    }
}
