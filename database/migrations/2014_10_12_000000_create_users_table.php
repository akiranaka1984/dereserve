<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
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
            $table->string('username')->unique();
            $table->string('firstname');
            $table->string('lastname');
            $table->string('email')->unique();
            $table->string('email_verify_token')->nullable();
            $table->integer('email_verify_status')->default(0);
            $table->string('password');
            $table->string('city');
            $table->string('profile_pics')->default('');
            $table->enum('role', ['user','admin'])->default('user');
            $table->integer('status')->default(1);
            $table->integer('is_admin_verify')->default(0);

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
}
