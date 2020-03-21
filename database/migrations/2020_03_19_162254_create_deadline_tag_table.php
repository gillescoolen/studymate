<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeadlineTagTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deadline_tag', function (Blueprint $table) {
            $table->integer('deadline_id')->unsigned();
            $table->foreign('deadline_id')->references('id')->on('deadline')
                ->onDelete('cascade');
                
            $table->string('tag_name');
            $table->foreign('tag_name')->references('name')->on('tag')
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
