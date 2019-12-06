<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCreateLeavesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('create_leaves', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id')->unsigned()->nullable();
            $table->string('empname');
            $table->string('empdepartment');
            $table->bigInteger('empid');
            $table->string('empemail');
            $table->string('recommenderEmail');
            $table->string('relieverEmail');
            $table->string('leavetype');
            $table->date('startdate');
            $table->date('enddate');
            $table->integer('available');
            $table->integer('totalleave');
            $table->integer('duration');
            $table->string('recommenderDep');
            $table->string('recommender')->nullable();
            $table->text('address');
            // $table->boolean('isapproveadmin')->default(0);
            // $table->boolean('isapprovesuperadmin')->default(0);
            $table->text('reason');
            $table->text('reliever')->nullable();
            $table->text('relieverDep')->nullable();
            $table->boolean('isapprovedbyadmin')->nullable();
            $table->boolean('isapprovedbyreliever')->nullable();
            $table->boolean('isapprovedbyrecommender')->nullable();
            $table->boolean('isapprovedbysuperadmin')->nullable();

            $table->timestamps();
        });
        // 'empname', 'empdepartment', 'leavetype', 'startdate', 
        // 'enddate', 'available', 'totalleave', 'recommenderDep', 'recommender'
        // ,'duration', 'address'
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('create_leaves');
    }
}
