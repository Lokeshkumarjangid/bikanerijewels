<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HouseBikaneri extends Model
{
    protected $table = 'house_bikaneri';

    protected $fillable = [
        'category_id',
        'section_1',
        'section_2',
        'section_3',
        'section_4',
        'section_5',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
