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
        Schema::table('orders', function (Blueprint $table) {
            $table->unsignedFloat('service_charge', 2)->after('charges')->default(0);
        });

        Schema::table('assigned_orders', function (Blueprint $table) {
            $table->string('pincode', 20)->after('time_slot_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn('service_charge');
        });

        Schema::table('assigned_orders', function (Blueprint $table) {
            $table->dropColumn('pincode');
        });
    }
};
