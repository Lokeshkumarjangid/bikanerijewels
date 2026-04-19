<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Navigation extends Model
{
    protected $table = 'tbl_navigation';

    protected $fillable = [
        'name',
    ];

    public function categories()
    {
         return $this->hasMany(Category::class, 'navigation_id')
                ->where('status', 1);
    }
}
