<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropCustomercheckstatusrelationsTableYixj extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        try {

                    Schema::dropIfExists('customer_check_status_relations');

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
        Schema::create('customer_check_status_relations', function (Blueprint $table) {
            $table->bigInteger('id')->autoIncrement();
			$table->bigInteger('customer_id')->index('customer_id');
			$table->bigInteger('check_status_id')->index('check_status_id');
			$table->timestamps();
        });
    }
}
