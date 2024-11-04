<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    use HasFactory;

    //registrasi nama table contents
    protected $table = 'contents';

    //registrasi nama field table contents
    protected $fillable = [
        'body',
        'post_id'
    ];

    // membuat relasi table content ke table post
    public function post()
    {
        return $this->belongsTo(Post::class);
    }



}
