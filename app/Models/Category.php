<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory, SoftDeletes;

    public static function boot() {
        parent::boot();

        self::creating(function ($category) {
            $category->slug = str()->slug($category->name);
        });

        self::updating(function ($category) {
            $category->slug = str()->slug($category->name);
        });
    }

    protected $guarded = [
        'id',
    ];

    protected $fillable = [
        'name',
    ];

    protected $casts = [
        //
    ];
}
