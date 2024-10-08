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
        Schema::create('send_notification_cronjobs', function (Blueprint $table) {
            $table->id();
            $table->unsignedTinyInteger('type')->comment('1 = sms, 2 = email');
            $table->string('target')->comment('mobile number or email id');
            $table->string('content');
            $table->string('method');
            $table->unsignedTinyInteger('is_send')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('send_notification_cronjobs');
    }
};
