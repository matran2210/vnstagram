<?php

namespace Api\Posts\Models;
use Illuminate\Database\Eloquent\Model;
use Api\Posts\Models\PostFile;

class Post extends Model
{

    protected $table = 'posts';
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


    /**
     * Liên kết 1 vs n với bảng post_files
     */
    public function postFile()
    {
        return $this->hasMany(PostFile::class,'post_id', 'id');
    }

}
