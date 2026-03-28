<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductFile extends Model
{

    protected $table = 'tbl_product_file';

    protected $fillable = [
        'product_id',
        'file_type',
        'file_path',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
