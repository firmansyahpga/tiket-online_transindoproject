<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropCustomerTableSjfa extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        try {

                    Schema::dropIfExists('customer');

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
        Schema::create('customer', function (Blueprint $table) {
            $table->bigInteger('id')->autoIncrement();
			$table->string('nama', 255);
			$table->string('jenis_kelamin', 255);
			$table->string('e_mail', 255);
			$table->string('no_hp', 255);
			$table->string('alamat', 255);
			$table->timestamps();
			$table->string('nama_konser', 255);
			$table->integer('nik');
        });
    }
}
