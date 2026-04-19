<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Cms extends Model
{
    use SoftDeletes;

    protected $table = 'tbl_cms';

    protected $fillable = [
        'title',
        'slug',
        'content',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'status',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($cms) {
            $cms->slug = Str::slug($cms->title);
        });
    }
}
