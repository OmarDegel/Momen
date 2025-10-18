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
            $table->foreignId('user_id');
            $table->foreignId('delivery_id')->nullable();
            $table->foreignId('cancel_by')->nullable();
            $table->timestamp('cancel_date')->nullable();
            $table->foreignId('address_id')->nullable();
            $table->foreignId('coupon_id')->nullable();
            $table->foreignId('payment_id')->nullable();
            $table->foreignId('region_id')->nullable();
            $table->foreignId('city_id')->nullable();
            $table->foreignId('branch_id')->nullable();
            $table->foreignId('country_id')->nullable();
            $table->double('tax')->default(0);
            $table->double('fees')->default(0);
            $table->double('price')->default(0);
            $table->double('shipping')->default(0);
            $table->double('discount')->default(0);
            $table->double('total')->default(0);
            $table->double('paid')->default(0);
            $table->double('wallet')->default(0);
            $table->double('total_paid')->default(0);
            $table->double('remaining')->default(0);
            $table->boolean('is_paid')->default(0);
            $table->tinyInteger('rate')->nullable();
            $table->mediumText('rate_comment')->nullable();
            $table->string('status', 50)->default('request');
            $table->foreignId('parent_id')->nullable();
            $table->foreignId('delivery_time_id')->nullable();
            $table->mediumText('polygon')->nullable();
            $table->foreignId('order_reject_id')->nullable();
            $table->mediumText('note')->nullable();
            $table->mediumText('delivery_note')->nullable();
            $table->mediumText('admin_note')->nullable();
            $table->mediumText('reject_note')->nullable();
            $table->boolean('is_read')->default(0);
            $table->boolean('active')->default(1);
            $table->softDeletes();
            $table->timestamps();
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
