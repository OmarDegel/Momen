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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
             $table->foreignId('user_id')
                ->nullable()
                ->constrained()
                ->nullOnDelete(); 

            $table->text('name')->nullable();
            $table->string('link', 50)->nullable();
            $table->text('title')->nullable();
            $table->text('content')->nullable();
            $table->text('image')->nullable();
            $table->string('background', 50)->nullable();
            $table->string('color', 50)->nullable();
            $table->text('icon')->nullable();
            $table->tinyInteger('order_id')->default(1);

            $table->foreignId('service_id')
                ->nullable()
                ->constrained()
                ->nullOnDelete();

            $table->unsignedBigInteger('parent_id')->nullable(); 

            $table->string('type', 50)->nullable();
            $table->string('status', 50)->nullable();
            $table->tinyInteger('active')->default(1);
            $table->tinyInteger('feature')->default(false);

            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
