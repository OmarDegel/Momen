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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
             $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('delivery_id')->nullable()->constrained('users')->nullOnDelete();
            $table->foreignId('cancel_by')->nullable()->constrained('users')->nullOnDelete();
            $table->timestamp('cancel_date')->nullable();
            $table->foreignId('address_id')->nullable()->constrained('addresses')->nullOnDelete();
            $table->foreignId('payment_id')->nullable()->constrained('payments')->nullOnDelete();
            $table->foreignId('region_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('city_id')->nullable()->constrained()->nullOnDelete();
            // $table->foreignId('branch_id')->nullable()->constrained()->nullOnDelete();
            // $table->foreignId('country_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('coupon_id')->nullable()->constrained('coupons')->nullOnDelete();

            $table->string('coupon_type')->nullable();
            $table->double('coupon_discount')->nullable();

            $table->double('tax')->default(0);
            $table->double('fees')->default(0);
            $table->double('price')->default(0);
            $table->double('shipping')->default(0);
            $table->double('discount')->default(0);
            $table->double('price_returned')->default(0);
            $table->double('total')->default(0);
            $table->double('paid')->default(0);
            $table->double('wallet')->default(0);
            $table->double('total_paid')->default(0);
            $table->double('remaining')->default(0);

            $table->boolean('is_paid')->default(0);
            $table->tinyInteger('rate')->nullable();
            $table->text('rate_comment')->nullable();
            $table->string('status')->default('request');

            $table->foreignId('parent_id')->nullable()->constrained('orders')->nullOnDelete();
            $table->foreignId('delivery_time_id')->nullable()->constrained('delivery_times')->nullOnDelete();
            $table->text('polygon')->nullable();
            $table->foreignId('order_reject_id')->nullable()->constrained('order_rejects')->nullOnDelete();

            $table->text('note')->nullable();
            $table->text('delivery_note')->nullable();
            $table->text('admin_note')->nullable();
            $table->text('reject_note')->nullable();

            $table->tinyInteger('is_read')->default(0);
            $table->tinyInteger('active')->default(1);

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
