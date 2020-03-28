<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeadlinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deadline', function (Blueprint $table) {
            $table->increments('id');
            $table->date('date');
            $table->integer('exam_id')->unsigned();
            $table->boolean('done')->default(0);
            $table->foreign('exam_id')->references('id')->on('exam')
                ->onDelete('cascade');
            $table->string('work')->nullable();
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
        Schema::dropIfExists('deadline');
    }
}
