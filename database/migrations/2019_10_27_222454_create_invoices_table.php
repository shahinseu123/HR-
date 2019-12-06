<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id')->unsigned()->nullable();
            $table->string('customer');
            $table->string('currency');
            $table->date('invoicedate');
            $table->date('duedate');
            $table->bigInteger('invoicenumber');
            $table->bigInteger('ordernumber');
            $table->integer('subtotal');
            $table->integer('tax');
            $table->integer('total');
            $table->text('details');
            $table->integer('isapprovedbyadmin')->default(0);
            $table->integer('isapprovedbysuperadmin')->default(0);
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
        Schema::dropIfExists('invoices');
    }
}
