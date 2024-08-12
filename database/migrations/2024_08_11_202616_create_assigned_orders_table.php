<?php

use App\Models\Order;
use App\Models\TimeSlot;
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
        Schema::create('assigned_orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('service_boy_user_id')->constrained('users');
            $table->foreignIdFor(Order::class)->constrained();
            $table->foreignIdFor(TimeSlot::class)->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assigned_orders');
    }
};
