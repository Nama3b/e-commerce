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
        Schema::create('tags', function (Blueprint $table) {
            $table->id();
            $table->json('reference_id')->nullable();
            $table->unsignedBigInteger('creator');
            $table->string('name');
            $table->enum('type', ['PRODUCT', 'POST']);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('creator')->references('id')->on('members')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tags');
    }
};
