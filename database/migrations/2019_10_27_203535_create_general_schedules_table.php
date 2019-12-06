<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGeneralSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('general_schedules', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('empid');
            $table->string('name');
            $table->string('department');
            $table->integer('schedulefrom');
            $table->integer('scheduleto');
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
        Schema::dropIfExists('general_schedules');
    }
}
