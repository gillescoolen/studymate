<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeacherModuleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teacher_module', function (Blueprint $table) {
            $table->integer('teacher_id')->unsigned();
            $table->foreign('teacher_id')->references('id')->on('teacher')->onDelete('cascade');
            $table->integer('module_id')->unsigned();
            $table->foreign('module_id')->references('id')->on('module')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('teacher_module');
    }
}
