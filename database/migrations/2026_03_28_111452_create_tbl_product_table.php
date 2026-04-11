<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tbl_product', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('categroy_id')->index();
            $table->string('product_name');
            $table->string('sku');
            $table->decimal('price', 10, 2)->nullable();
            $table->decimal('sale_price', 10, 2)->nullable();
            $table->decimal('qty', 10, 2)->nullable();
            $table->string('colour')->nullable();
            $table->string('metal_type')->nullable();
            $table->string('metal_finish')->nullable();
            $table->decimal('gross_weight', 10, 2)->nullable();
            $table->decimal('net_weight', 10, 2)->nullable();
            $table->boolean('status')->default(1)->comment('1=active, 0=inactive');
            $table->text('diamond_details')->nullable();
            $table->text('stone_details')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_product');
    }
};
