<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name',50);
            $table->string('surname',50);
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->date('date_of_birth');
            $table->string('address');
            $table->text('bio')->nullable();
            $table->text('img_path')->nullable();
            $table->text('bg_dev')->nullable();
            $table->text('github_link')->nullable();
            $table->text('linkedin_link')->nullable();
            $table->string('vat_number')->unique()->nullable();
            $table->text('cv')->nullable();
            $table->string('phone_number')->nullable();
            $table->text('soft_skill')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
