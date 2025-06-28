<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'game_title',
        'game_description',
        'game_image',
        'game_rating',
        'game_status',
        'category_id',
        'platform_id',
        'review_likes',
        'game_duration',
    ];

    // Relacionamentos
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'category_id');
    }

    public function plataforma()
    {
        return $this->belongsTo(Plataforma::class, 'platform_id');
    }
}
