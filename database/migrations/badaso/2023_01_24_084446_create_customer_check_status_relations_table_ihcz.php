<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomercheckstatusrelationsTableIhcz extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        try {

                    Schema::create('customer_check_status_relations', function (Blueprint $table) {
            $table->bigInteger('id')->unsigned()->autoIncrement();
			$table->bigInteger('customer_id')->unsigned();
			$table->bigInteger('check_status_id')->unsigned();
			$table->timestamps();
        });

        Schema::table('customer_check_status_relations', function (Blueprint $table) {
            $table->foreign('customer_id')->references('id')->on('customer')->onDelete('cascade')->onUpdate('restrict');
			$table->foreign('check_status_id')->references('id')->on('check_status')->onDelete('cascade')->onUpdate('restrict');
        });

        } catch (PDOException $ex) {
            $this->down();
            throw $ex;
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customer_check_status_relations');
    }
}
