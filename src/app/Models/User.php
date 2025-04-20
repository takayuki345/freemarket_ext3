<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function userInfo()
    {
        return $this->hasOne(UserInfo::class);
    }

    public function likes()
    {
        return $this->belongsToMany(Item::class, 'likes');
    }

    public function items()
    {
        return $this->hasMany(Item::class);
    }

    public function messages()
    {
        return $this->hasMany(Message::class);
    }

    public function totalMessageCount()
    {
        $userId = $this->id;
        $count = Message::where('user_id', '!=', $userId)
            ->where('unchecked', true)
            ->whereHas('item', function($query) use ($userId) {
                $query->where('user_id', $userId)
                    ->orWhere('purchase_user_id', $userId);
            })->count();

        return $count;
    }

    public function totalEvaluationCount()
    {
        $userId = $this->id;
        $userEvaluationCount = Item::where('user_id', $userId)
            ->whereNotNull('user_evaluation')
            ->count();
        $purchaseUserEvaluationCount = Item::where('purchase_user_id', $userId)
            -> whereNotNull('purchase_user_evaluation')
            ->count();

        return $userEvaluationCount + $purchaseUserEvaluationCount;
    }

    public function totalEvaluation()
    {
        $userId = $this->id;
        $totalUserEvaluation = Item::where('user_id', $userId)
            ->whereNotNull('user_evaluation')
            ->sum('user_evaluation');
        $totalPurchaseUserEvaluation = Item::where('purchase_user_id', $userId)
            ->whereNotNull('purchase_user_evaluation')
            ->sum('purchase_user_evaluation');

        return $totalUserEvaluation + $totalPurchaseUserEvaluation;
    }
}
