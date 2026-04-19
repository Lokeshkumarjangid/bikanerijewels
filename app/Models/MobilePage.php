<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MobilePage extends Model
{
    protected $table = 'tbl_mob_page';

    protected $fillable = [
        'title',
        'first_image',
        'second_image',
        'third_image',
    ];
}
