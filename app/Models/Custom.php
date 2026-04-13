<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Custom extends Model
{
    use SoftDeletes;

    protected $table = 'tbl_custom';

    protected $fillable = [
        'user_id',
        'name',
        'email',
        'mobile',
        'address',
        'item_name',
        'size',
        'delivery_date',
        'estimate',
        'metal_purity',
        'breadth',
        'meena_front_side',
        'back_side',
        'utrai',
        'buggate',
        'diamond',
        'rosecut',
        'polki',
        'dank',
        'colour_stone',
        'rodium',
        'look',
        'melting',
        'mani',
        'pearl',
        'pearl_colour',
        'cheedh',
        'beads',
        'melon',
        'badam',
        'goshware'
    ];
}
