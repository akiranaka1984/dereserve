<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWebReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('web_reservations', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_unicode_ci';

            $table->id();
            $table->integer('user_id');
            $table->string('name');
            $table->string('mail');
            $table->string('tel');
            $table->string('lineid')->nullable();
            $table->string('lady1');
            $table->string('lady2');
            $table->string('lady3');
            $table->string('month1');
            $table->string('day1');
            $table->string('hour1');
            $table->string('minut1');
            $table->string('month2');
            $table->string('day2');
            $table->string('hour2');
            $table->string('minut2');
            $table->string('month3');
            $table->string('day3');
            $table->string('hour3');
            $table->string('minut3');
            $table->string('cource');
            $table->string('place')->nullable();
            $table->string('pay')->nullable();
            $table->string('contact')->nullable();
            $table->text('cmnt')->nullable();
            $table->integer('compatible')->default(0);
            $table->integer('status')->default(1);
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
        Schema::dropIfExists('web_reservations');
    }
}
