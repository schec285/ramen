<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{

    // UUIDを主キーに設定
    public $incrementing = false;
    protected $keyType = 'string';
    
    // リレーションシップ定義
    public function blogs()
    {
        return $this->belongsToMany(Blog::class);
    }
}
