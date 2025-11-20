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
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('city_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('region_id')->nullable()->constrained()->nullOnDelete();

            $table->tinyInteger('order_id')->default(1);
            $table->text('address')->nullable();
            $table->string('phone', 191);
            $table->string('name', 255)->nullable();
            $table->string('type', 50)->default('house');
            $table->boolean('is_main')->default(false);
            $table->string('latitude', 191);
            $table->string('longitude', 191);
            $table->text('geo_address')->nullable();
            $table->string('geo_state', 191)->nullable();
            $table->string('geo_city', 191)->nullable();
            $table->string('place_id', 191)->nullable();
            $table->string('postal_code', 191)->nullable();
            $table->string('building', 191)->nullable();
            $table->string('floor', 191)->nullable();
            $table->string('apartment', 191)->nullable();
            $table->text('additional_info')->nullable();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('addresses');
    }
};
