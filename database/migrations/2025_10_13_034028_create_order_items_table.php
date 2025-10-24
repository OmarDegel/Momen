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
        Schema::create('order_items', function (Blueprint $table) {
            $table->id();

            $table->foreignId('order_id')->constrained('orders')->cascadeOnDelete();
            $table->foreignId('product_id')->constrained('products')->onDelete('cascade');
            $table->foreignId('product_child_id')->nullable()->constrained('products')->onDelete('cascade');
            $table->double('offer_price')->nullable();
            $table->double('price');
            $table->integer('amount');
            $table->double('price_addition')->nullable()->default(0);
            $table->integer('amount_addition')->nullable()->default(0);
            $table->integer('offer_amount')->nullable()->default(0);
            $table->integer('offer_amount_add')->nullable()->default(0);
            $table->integer('free_amount')->nullable()->default(0);

            $table->integer('total_amount');
            $table->double('total');
            $table->double('total_price');
            $table->double('shipping')->default(0);
            $table->tinyInteger('is_return')->default(0);
            $table->dateTime('return_at')->nullable();

            $table->timestamps();
            $table->softDeletes();
            });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_items');
    }
};
