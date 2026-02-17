<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    // UUIDを主キーに設定
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false; // タイムスタンプ無効化
    
    // リレーションシップ定義
    public function blogs()
    {
        return $this->belongsToMany(Blog::class);
    }
}
