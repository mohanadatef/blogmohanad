<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CommentBlog extends Model
{
    protected $fillable = [
        'comment', 'blog_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $table = 'commentblogs';
    public $timestamps = true;
    public function blog()
    {
        return $this->belongsTo('App\Blog','blog_id');
    }
}
