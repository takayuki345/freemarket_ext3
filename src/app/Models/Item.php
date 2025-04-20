<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'condition_id',
        'name',
        'description',
        'image',
        'brand',
        'price',
        'purchaser',
        'payment_id',
        'post_code',
        'address',
        'building',
        'message_status',
        'message_updated_at',
        'user_evaluation',
        'purchase_user_evaluation',
    ];

    public function condition()
    {
        return $this->belongsTo(Condition::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function payment()
    {
        return $this->belongsTo(Payment::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function likes()
    {
        return $this->belongsToMany(User::class, 'likes');
    }

    public function purchaseUser()
    {
        return $this->belongsTo(User::class, 'purchase_user_id');
    }

    public function messages()
    {
        return $this->hasMany(Message::class);
    }

    public function messageCount($userId)
    {
        $count = Message::where('item_id', $this->id)
            ->where('unchecked', true)
            ->where('user_id', '!=', $userId)
            ->count();

        return $count;
    }
}
