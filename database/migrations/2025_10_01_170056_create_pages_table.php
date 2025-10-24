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
        Schema::create('pages', function (Blueprint $table) {
           $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('product_id')->nullable();
            $table->text('name')->nullable();
            $table->string('link', 50)->nullable();
            $table->text('title')->nullable();
            $table->text('content')->nullable();
            $table->text('image')->nullable();
            $table->text('video')->nullable();
            $table->text('icon')->nullable();
            $table->string('type', 50)->nullable();
            $table->string('page_type', 50)->nullable();
            $table->tinyInteger('order_id')->default(1);
            $table->unsignedBigInteger('parent_id')->nullable();
            $table->tinyInteger('active')->default(1);
            $table->boolean('feature')->default(0);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pages');
    }
};
