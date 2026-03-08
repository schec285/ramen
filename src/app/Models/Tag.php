<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory, HasUuids;
    public $timestamps = false; // タイムスタンプ無効化

    protected $fillable = ['name'];

    // リレーションシップ定義
    public function blogs()
    {
        return $this->belongsToMany(Blog::class);
    }
}
