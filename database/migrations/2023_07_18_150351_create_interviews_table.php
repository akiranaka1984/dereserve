<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInterviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('interviews', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_unicode_ci';

            $table->id();
            $table->string('name');
            $table->string('mail');
            $table->string('tel');
            $table->string('line_id');
            $table->string('inquiry');
            $table->string('age');
            $table->string('height');
            $table->string('weight');
            $table->string('bust');
            $table->string('tattoo');
            $table->string('interview_date')->nullable();
            $table->string('experience')->nullable();
            $table->string('appealing_points')->nullable();
            $table->text('other_message');
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
        Schema::dropIfExists('interviews');
    }
}
