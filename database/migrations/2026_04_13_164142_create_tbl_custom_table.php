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
        Schema::create('tbl_custom', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->index();
            $table->string('name');
            $table->string('email');
            $table->string('mobile')->nullable();
            $table->string('custom_image')->nullable();
            $table->text('description')->nullable();
            $table->text('address')->nullable();
            $table->string('item_name')->nullable();
            $table->string('size')->nullable();
            $table->date('delivery_date')->nullable();
            $table->string('estimate')->nullable();
            $table->string('metal_purity')->nullable();
            $table->string('breadth')->nullable();
            $table->string('meena_front_side')->nullable();
            $table->string('back_side')->nullable();
            $table->string('utrai')->nullable();
            $table->string('buggate')->nullable();
            $table->string('diamond')->nullable();
            $table->string('rosecut')->nullable();
            $table->string('polki')->nullable();
            $table->string('dank')->nullable();
            $table->string('colour_stone')->nullable();
            $table->string('rodium')->nullable();
            $table->string('look')->nullable();
            $table->string('melting')->nullable();
            $table->string('mani')->nullable();
            $table->string('pearl')->nullable();
            $table->string('pearl_colour')->nullable();
            $table->string('cheedh')->nullable();
            $table->string('beads')->nullable();
            $table->string('melon')->nullable();
            $table->string('badam')->nullable();
            $table->string('goshware')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_custom');
    }
};
