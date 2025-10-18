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
                $table->foreignId('product_id');
                $table->foreignId('product_child_id')->nullable();
                $table->foreignId('order_id');
                $table->double('offer_price')->nullable();
                $table->double('price')->default(1);
                $table->double('amount')->default(1);
                $table->double('price_addition')->default(0);
                $table->double('amount_addition')->nullable();
                $table->double('offer_amount')->default(0);
                $table->double('offer_amount_add')->default(0);
                $table->double('free_amount')->nullable();
                $table->double('total_amount')->default(1);
                $table->double('total')->default(1);
                $table->double('total_price')->default(1);
                $table->timestamps();
                $table->boolean('is_return')->default(false);
                $table->dateTime('return_at')->nullable();
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
