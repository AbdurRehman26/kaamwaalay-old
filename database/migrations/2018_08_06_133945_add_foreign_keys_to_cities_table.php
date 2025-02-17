<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToCitiesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table(
            'cities', function (Blueprint $table) {
                $table->foreign('state_id')->references('id')->on('states')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            }
        );
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table(
            'cities', function (Blueprint $table) {
                $table->dropForeign('cities_state_id_foreign');
            }
        );
    }

}
