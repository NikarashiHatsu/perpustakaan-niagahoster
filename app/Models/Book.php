<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Book extends Model
{
    use HasFactory, SoftDeletes;

    public static function boot() {
        parent::boot();

        self::creating(function ($book) {
            $book->cover = 'image/book-cover-default.jpeg';
            $book->slug = str()->slug($book->title);
        });

        self::updating(function ($book) {
            $book->slug = str()->slug($book->title);
        });
    }

    public function publisher(): BelongsTo
    {
        return $this->belongsTo(Publisher::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    protected $guarded = [
        'id',
    ];

    protected $fillable = [
        'publisher_id',
        'category_id',
        'title',
        'slug',
        'cover',
        'published_date',
    ];

    protected $casts = [
        //
    ];
}
