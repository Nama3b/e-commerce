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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('role_id')->default(3);
            $table->string('email')->unique();
            $table->string('password');
            $table->string('full_name');
            $table->string('address');
            $table->string('phone_number')->unique();
            $table->date('birthday')->nullable();
            $table->string('image')->default('../WebPage/img/home/logo.jpg')->nullable();
            $table->boolean('status')->default(1);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customers');
    }
};
