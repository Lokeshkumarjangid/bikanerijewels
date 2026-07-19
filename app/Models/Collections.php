<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Collections extends Model
{
    protected $table = 'collections';

    protected $fillable = [
        'category_id',
        'first_section_web',
        'first_section_mobile',
        'second_title',
        'second_description',
        'second_section_web',
        'second_section_mobile',
        'third_section_web_video',
        'third_section_mobile_video',
        'fourth_title',
        'fourth_description',
        'fourth_image_first',
        'fourth_image_secound',
        'fourth_image_third',
        'five_section_web',
        'five_section_mobile',
    ];

    public function categroy()
    {
        return $this->belongsTo(Category::class);
    }
}
