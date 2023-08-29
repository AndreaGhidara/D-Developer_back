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
        Schema::create('sponsor_users', function (Blueprint $table) {
            $table->id();
            $table->foreignId('users_id')->nullable()->constrained();
            $table->foreignId('sponsors_id')->nullable()->constrained();
            $table->dateTime('end_sponsors')->nullable();
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
        Schema::dropIfExists('sponsor_users');
    }
};
