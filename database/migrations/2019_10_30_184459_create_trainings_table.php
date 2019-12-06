<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrainingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trainings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('empid');
            $table->string('name');
            $table->string('department');
            $table->date('startdate');
            $table->date('enddate');
            $table->string('trainingon');
            $table->string('trainingtype');
            $table->text('remark');
            $table->timestamps();
        });
        // empid: '',
        // name: '',
        // department: '',
        // startdate: '',
        // enddate: '',
        // trainingon: '',
        // trainingtype: '',
        // remark: ''
    }
     
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trainings');
    }
}
