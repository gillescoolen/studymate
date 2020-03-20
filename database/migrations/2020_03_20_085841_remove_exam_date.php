<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveExamDate extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasColumn('exam', 'date')) {
            Schema::table('exam', function (Blueprint $table) {
                $table->dropColumn('date');
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (!Schema::hasColumn('exam', 'date')) {
            Schema::table('exam', function (Blueprint $table) {
                $table->date('date')->nullable();
            });
        }
    }
}
