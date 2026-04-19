<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserAddress extends Model
{
    protected $table = 'tbl_user_address';

    protected $fillable = [
        'user_id',
        'address_line1',
        'address_line2',
        'city',
        'state',
        'postal_code',
        'status',
        'is_default',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
