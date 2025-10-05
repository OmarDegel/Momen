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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name', 191)->nullable();
            $table->string('username', 191)->nullable();
            $table->string('full_name', 191)->nullable();
            $table->string('name_first', 191)->nullable();
            $table->string('name_last', 191)->nullable();
            $table->string('email', 191)->nullable();
            $table->string('password', 191)->nullable();
            $table->string('duvider', 150)->nullable();
            $table->string('provider_id', 150)->nullable();
            $table->string('provider_token', 150)->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('type', 50)->nullable();
            $table->string('image', 191)->nullable();
            $table->string('phone', 191)->nullable();
            $table->string('phone_code', 50)->nullable();
            $table->timestamp('last_active')->nullable();
            $table->rememberToken();
            $table->string('code', 50)->nullable();
            $table->timestamp('code_expire')->nullable();
            $table->string('sms_code', 50)->nullable();
            $table->dateTime('sms_code_expire')->nullable();
            $table->unsignedBigInteger('country_id')->nullable();
            $table->unsignedBigInteger('city_id')->nullable();
            $table->unsignedBigInteger('branch_id')->nullable();
            $table->unsignedBigInteger('address_id')->nullable();
            $table->unsignedBigInteger('group_id')->nullable();
            $table->string('latitude', 191)->nullable();
            $table->string('longitude', 191)->nullable();
            $table->text('polygon')->nullable();
            $table->date('birth_date')->nullable();
            $table->string('gender', 50)->nullable();
            $table->string('locale', 191)->default('en');
            $table->string('theme', 255)->default('dark');
            $table->tinyInteger('active')->default(1);
            $table->tinyInteger('vip')->default(0);
            $table->tinyInteger('all_branch')->default(0);
            $table->tinyInteger('is_message')->default(0);
            $table->tinyInteger('is_notify')->default(0);
            $table->tinyInteger('is_stock')->default(1);
            $table->tinyInteger('is_tracking')->default(1);
            $table->tinyInteger('is_offer')->default(1);
            $table->tinyInteger('is_client')->default(0);
            $table->tinyInteger('is_admin')->default(0);
            $table->tinyInteger('is_store')->default(0);
            $table->tinyInteger('is_delivery')->default(0);
            $table->tinyInteger('is_available')->default(0);
            $table->double('wallet')->default(0);
            $table->double('point')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
