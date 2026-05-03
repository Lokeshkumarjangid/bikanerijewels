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
        Schema::create('tbl_contactus', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable()->index();
            $table->string('name');
            $table->string('email');
            $table->string('mobile')->nullable();
            $table->text('message')->nullable();
            $table->date('contact_date')->nullable();
            $table->time('contact_time')->nullable();
            $table->tinyInteger('type')->comment('1=>home,2=>contactus,3=>app');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_contactus');
    }
};
