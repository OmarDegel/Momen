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
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();

            $table->text('name')->nullable();
            $table->string('link')->nullable();
            $table->text('title')->nullable();
            $table->text('content')->nullable();
            $table->text('image')->nullable();
            $table->text('icon')->nullable();
            $table->text('video')->nullable();

            $table->string('type', 50)->nullable();
            $table->string('service_type', 50)->nullable();
            $table->string('option_type', 50)->nullable();

            $table->tinyInteger('order_id')->default(1);
            $table->unsignedBigInteger('parent_id')->nullable();

            $table->tinyInteger('is_open')->default(1);
            $table->tinyInteger('active')->default(1);

            $table->timestamps();
            $table->softDeletes();

            $table->index('user_id', 'services_user_id_foreign');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
