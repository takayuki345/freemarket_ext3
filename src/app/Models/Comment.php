<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'comment_user_id',
        'item_id',
        'content'
    ];

    public function commentUser()
    {
        return $this->belongsTo(User::class, 'comment_user_id');
    }
}
