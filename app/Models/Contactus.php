<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contactus extends Model
{
    protected $table = 'tbl_contactus';

    protected $fillable = [
        'user_id',
        'name',
        'email',
        'mobile',
        'message',
        'contact_date',
        'contact_time',
        'type',
        'city',
        'state',
        'address',
        'store'
    ];
}
