<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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
            $table->string('username', 100)->nullable(false);
            $table->string('email', 255)->unique()->nullable(false);
            $table->string('password', 255)->nullable(false);
            $table->unsignedBigInteger('role')->nullable(true);
            $table->string('userImage', 255)->nullable(true);
            $table->timestamps();

            $table->foreign('role')->references('id')->on('roles');
        });
        DB::table('users')->insert([
            'username' => 'Admin1',
            'email' => 'admin1@example.com',
            'password' => Hash::make('password'),
            'role' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
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
