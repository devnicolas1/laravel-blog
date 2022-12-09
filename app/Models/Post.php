<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'metaTitle', 'metaDescription', 'metaKeywords', 'title', 'noAccentsTitle', 'excerpt', 'body', 'image_path'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
