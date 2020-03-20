<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeadlineTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deadline_tags', function (Blueprint $table) {
            $table->integer('deadline')->unsigned();
            $table->string('tag');
            $table->foreign('deadline')->references('id')->on('deadline')
                ->onDelete('cascade');
            $table->foreign('tag')->references('name')->on('tag')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('deadline_tags');
    }
}
