<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'user_id',
        'store_name',
        'ramen_name',
        'price',
        'latitude',
        'longitude',
        'place_id',
        'postal_code',
        'country_iso',
        'prefecture',
        'city',
        'address',
        'formatted_address',
        'thumbnail_image_path',
        'score',
        'body',
    ];

    /**
     * リレーションシップ定義
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function prefecture(): BelongsTo
    {
        return $this->belongsTo(Prefecture::class);
    }
    
    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class);
    }

    /// アクセサ定義
    public function getScoreThemeAttribute() {
        $map = [
            'perfect' => ['bg' => 'score--perfect-bg', 'text' => 'score--perfect-text'],
            'excellent'=> ['bg'=> 'score--excellent-bg','text'=> 'score--excellent-text'],
            'good' => ['bg' => 'score--good-bg', 'text' => 'score--good-text'],
            'medium' => ['bg' => 'score--medium-bg', 'text' => 'score--medium-text'],
            'fair' => ['bg' => 'score--fair-bg', 'text' => 'score--fair-text'],
            'poor' => ['bg' => 'score--poor-bg', 'text' => 'score--poor-text'],
        ];
        $score = $this->score;
        
        if ($score === 100) {
            return $map['perfect'];
        } elseif ($score >= 90) {
            return $map['excellent'];
        } elseif ($score >= 80) {
            return $map['good'];
        } elseif ($score >= 70) {
            return $map['medium'];
        } elseif ($score >= 50) {
            return $map['fair'];
        } else {
            return $map['poor'];
        }
    }
}
