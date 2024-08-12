<?php

use App\Models\Category;
use App\Models\Coupon;
use App\Models\TimeSlot;
use App\Models\User;
use App\Models\UserAddress;
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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(TimeSlot::class)->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignIdFor(User::class)->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignIdFor(Category::class)->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('sub_category_id')->constrained('categories')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignIdFor(UserAddress::class)->nullable()->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignIdFor(Coupon::class)->nullable()->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('order_no', 20);
            $table->unsignedInteger('amount');
            $table->unsignedTinyInteger('status')->default(0)->comment('0 = placed, 1 = assigned, 2 = confirmed, 3 = processing, 4 = completed, 5 = cancelled, 6 = refunded');
            $table->unsignedTinyInteger('is_assigned')->default(0)->comment('1 = assigned, 0 = unassigned');
            $table->unsignedInteger('charges')->nullable();
            $table->unsignedInteger('gst_charge')->nullable();
            $table->unsignedInteger('total');
            $table->date('scheduled_on');
            $table->date('serviced_on')->nullable();
            $table->text('order_note')->nullable();
            $table->unsignedTinyInteger('payment_type')->default(1)->comment('0 = prepaid, 1 = postpaid');
            $table->unsignedTinyInteger('payment_method')->default(0)->comment('0 = cash, 1 = online');
            $table->unsignedTinyInteger('payment_status')->default(0)->comment('0 = unpaid, 1 = paid, 2 = failed');
            $table->string('invoice_path')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
