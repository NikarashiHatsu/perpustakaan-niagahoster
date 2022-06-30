<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Publisher extends Model
{
    use HasFactory, SoftDeletes;

    public static function boot() {
        parent::boot();

        self::creating(function ($publisher) {
            $publisher->slug = str()->slug($publisher->name);
        });

        self::updating(function ($publisher) {
            $publisher->slug = str()->slug($publisher->name);
        });
    }

    protected $guarded = [
        'id',
    ];

    protected $fillable = [
        'name',
        'slug',
        'address',
        'phone',
    ];

    protected $casts = [
        //
    ];
}
