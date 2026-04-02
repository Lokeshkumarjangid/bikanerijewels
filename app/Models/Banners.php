<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Banners extends Model
{
    protected $table = 'banners';

    protected $fillable = [
        'banner_img_web',
        'banner_img_mob',
        'sort_order',
        'status'
    ];
}
