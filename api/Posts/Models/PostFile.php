<?php

namespace Api\Posts\Models;
use Illuminate\Database\Eloquent\Model;
use Api\Posts\Models\Post;

class PostFile extends Model
{

    protected $table = 'post_files';
    protected $keyType = 'string';
    protected $timestamp = false;
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        ''
    ];
    public $incrementing = false;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }

}
