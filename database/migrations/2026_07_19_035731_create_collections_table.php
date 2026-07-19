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
        Schema::create('collections', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained('categories')->cascadeOnDelete();
            $table->string('first_section_web')->nullable();
            $table->string('first_section_mobile')->nullable();
            $table->string('second_title')->nullable();
            $table->text('second_description')->nullable();
            $table->string('second_section_web')->nullable();
            $table->string('second_section_mobile')->nullable();
            $table->string('third_section_web_video')->nullable();
            $table->string('third_section_mobile_video')->nullable();
            $table->string('fourth_title')->nullable();
            $table->string('fourth_description')->nullable();
            $table->string('fourth_image_first')->nullable();
            $table->string('fourth_image_secound')->nullable();
            $table->string('fourth_image_third')->nullable();
            $table->string('five_section_web')->nullable();
            $table->string('five_section_mobile')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('collections');
    }
};
