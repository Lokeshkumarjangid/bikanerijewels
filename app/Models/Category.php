<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'navigation_id',
        'status'
    ];

    public function navigation()
    {
        return $this->belongsTo(Navigation::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class,'categroy_id');
    }
}
