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
        Schema::create('banner_sliders', function (Blueprint $table) {
            $table->id();
            $table->string('image');
            $table->string('small_text')->nullable();
            $table->string('main_black_text');
            $table->string('main_color_text');
            $table->string('text_color');
            $table->string('offer_text')->nullable();
            $table->string('button_text');
            $table->string('button_color');
            $table->string('button_link')->nullable();
            $table->boolean('status')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('banner_sliders');
    }
};
