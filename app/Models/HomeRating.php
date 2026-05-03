<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HomeRating extends Model
{
    protected $table = 'tbl_home_rating';

    protected $fillable = [
        'user_name',
        'description',
    ];

}
