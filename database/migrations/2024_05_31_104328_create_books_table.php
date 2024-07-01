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
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('Title', 250);
            $table->string('Author', 250);
            $table->text('Description')->nullable();
            $table->string('CoverImage', 100)->nullable();
            $table->string('Publisher', 250)->nullable();
            $table->unsignedBigInteger('Genre')->nullable(false);
            $table->integer('PageCount')->nullable();
            $table->string('Language', 50)->nullable();
            $table->string('Format', 50)->nullable();
            $table->timestamps();

            $table->foreign('Genre')->references('id')->on('genre');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('books');
    }
};
