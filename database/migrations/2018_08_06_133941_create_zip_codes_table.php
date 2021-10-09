<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateZipCodesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'zip_codes', function (Blueprint $table) {
                $table->increments('id');
                $table->string('city', 50)->nullable();
                $table->string('zip_code')->unique();
                $table->integer('city_id')->unsigned()->nullable();
                $table->integer('state_id')->unsigned()->nullable();
                $table->decimal('longitude', 11, 8);
                $table->decimal('latitude', 10, 8);
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
        Schema::drop('zip_codes');
    }

}
