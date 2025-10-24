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
        Schema::create('order_item_returns', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('order_id')->constrained('orders');
            $table->foreignId('order_item_id')->constrained('order_items');
            $table->foreignId('reason_id')->nullable()->constrained('reasons')->nullOnDelete();
            $table->foreignId('coupon_id')->nullable()->constrained('coupons')->nullOnDelete();

            $table->integer('amount')->default(0);               
            $table->integer('free_amount')->default(0);           
            $table->integer('offer_amount')->nullable()->default(0);     
            $table->integer('offer_amount_add')->nullable()->default(0); 
            $table->integer('actual_amount')->default(0);       

            $table->double('price')->default(0);               
            $table->double('offer_price')->nullable()->default(0); 
            $table->double('price_return')->default(0);         
            $table->double('total_price_return')->default(0);    

            $table->string('coupon_type')->nullable();            
            $table->double('coupon_discount')->nullable()->default(0);
            $table->double('coupon_discount_return')->nullable()->default(0); 

            $table->text('note')->nullable();
            $table->string('image')->nullable();

            $table->string('status')->default('request');
            $table->boolean('is_returned')->default(0);
            $table->dateTime('returned_at')->nullable();

            $table->foreignId('approved_by')->nullable()->constrained('users')->nullOnDelete();
            $table->dateTime('approved_at')->nullable();

            $table->foreignId('rejected_by')->nullable()->constrained('users')->nullOnDelete();
            $table->dateTime('rejected_at')->nullable();

            $table->unique('order_item_id');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_item_returns');
    }
};
