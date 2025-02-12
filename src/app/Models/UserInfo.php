<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserInfo extends Model
{
    use HasFactory;

    // protected $table = 'user_infos';

    protected $fillable = [
        'image',
        'post_code',
        'address',
        'building'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
