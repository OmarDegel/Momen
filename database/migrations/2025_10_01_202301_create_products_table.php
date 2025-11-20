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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('unit_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('brand_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('size_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('color_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('parent_id')->nullable()->constrained('products')->nullOnDelete();

            $table->text('name');
            $table->string('link', 191)->nullable();
            $table->string('code', 191)->nullable();
            $table->string('type', 191)->nullable();
            $table->string('status', 191)->nullable();
            $table->text('image')->nullable();
            $table->string('background', 50)->nullable();
            $table->string('color', 50)->nullable();
            $table->text('video')->nullable();
            $table->text('content')->nullable();

            $table->double('max_amount')->nullable();
            $table->tinyInteger('max_addition')->nullable();
            $table->tinyInteger('max_addition_free')->nullable();

            $table->string('offer_type', 191)->nullable();
            $table->double('offer_price')->nullable();
            $table->double('offer_amount')->nullable();
            $table->double('offer_amount_add')->nullable();
            $table->double('offer_percent')->nullable();

            $table->double('price')->default(1);
            $table->double('price_start')->default(0);
            $table->double('price_end')->default(0);

            $table->double('start')->default(1);
            $table->double('skip')->default(1);

            $table->integer('rate_count')->nullable();
            $table->double('rate_all')->nullable();
            $table->double('rate')->nullable();

            $table->double('order_limit')->nullable();
            $table->double('order_max')->nullable();

            $table->timestamp('date_start')->nullable();
            $table->timestamp('date_expire')->nullable();

            $table->string('day_start', 50)->nullable();
            $table->string('day_expire', 50)->nullable();

            $table->string('prepare_time', 191)->nullable();

            $table->tinyInteger('order_id')->default(1);
            $table->tinyInteger('is_late')->default(0);
            $table->tinyInteger('is_size')->default(0);
            $table->tinyInteger('is_color')->default(0);
            $table->tinyInteger('is_max')->default(0);
            $table->tinyInteger('is_filter')->default(0);
            $table->tinyInteger('is_offer')->default(0);
            $table->tinyInteger('is_sale')->default(0);
            $table->tinyInteger('is_new')->default(0);
            $table->tinyInteger('is_special')->default(0);
            $table->tinyInteger('is_stock')->default(1);

            $table->double('shipping')->default(0);
            $table->tinyInteger('is_shipping_free')->default(0);
            $table->tinyInteger('is_returned')->default(0);

            $table->tinyInteger('feature')->default(0);
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
        Schema::dropIfExists('products');
    }
};
