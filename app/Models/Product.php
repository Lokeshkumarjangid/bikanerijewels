<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    protected $table = 'tbl_product';

    protected $fillable = [
        'categroy_id',
        'product_name',
        'sku',
        'colour',
        'metal_type',
        'metal_finish',
        'gross_weight',
        'status',
    ];


    public function files()
    {
        return $this->hasMany(ProductFile::class, 'product_id');
    }

    public function images()
    {
        return $this->hasMany(ProductFile::class, 'product_id')
            ->where('file_type', 'image');
    }

    public function video()
    {
        return $this->hasOne(ProductFile::class, 'product_id')
            ->where('file_type', 'video');
    }
}
