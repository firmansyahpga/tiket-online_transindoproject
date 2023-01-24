<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropCheckcustomerTableSbhu extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        try {

                    Schema::dropIfExists('check_customer');

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
        Schema::create('check_customer', function (Blueprint $table) {
            $table->bigInteger('id')->autoIncrement();
			$table->string('nama', 255);
			$table->string('status', 255);
			$table->timestamps();
        });
    }
}
