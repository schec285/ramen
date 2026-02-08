<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    // UUIDを主キーに設定
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'store_name',
        'ramen_name',
        'price',
        'postal_code',
        'prefecture',
        'city',
        'address',
        'latitude',
        'longitude',
        'score',
        'body',
    ];

    /**
     * リレーションシップ定義
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
