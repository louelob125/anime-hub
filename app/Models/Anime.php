<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anime extends Model
{
    use HasFactory;

    protected $fillable = [
        'english_title',
        'japanese_title',
        'author_id',
        'genre_id',
        'type_id',
        'platform_id',
        'collection_id',
        'ratings',
        'synopsis',
        'episode_count',
        'release_date',
        'image_url'
    ];

    public function author()
    {
        return $this->belongsTo(Author::class);
    }

    public function genre()
    {
        return $this->belongsTo(Genre::class);
    }

    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    public function platform()
    {
        return $this->belongsTo(Platform::class);
    }

    public function collection()
    {
        return $this->belongsTo(Collection::class);
    }
}
