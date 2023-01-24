<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterCheckcustomerTableJlyq extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        try {

                    Schema::table('check_customer', function (Blueprint $table) {
            $table->integer('id_customer')->charset('')->collation('')->change();
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
        Schema::table('check_customer', function (Blueprint $table) {
            $table->string('id_customer', 255)->charset('')->collation('')->change();
			$table->string('id_customer', 255)->nullable(true)->charset('')->collation('')->change();
        });
    }
}
