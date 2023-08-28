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
        Schema::create('user_sponsor', function (Blueprint $table) {
            $table->id();
            $table->foreignId('users_id')->nullable()->constrained();
            $table->foreignId('sponsor_id')->nullable()->constrained();
            $table->dateTime('end_sponsor');
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
        Schema::dropIfExists('user_sponsor');
    }
};
