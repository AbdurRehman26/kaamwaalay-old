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
                $table->string('zip_code', 50);
                $table->decimal('latitude', 10, 8);
                $table->decimal('longitude', 10, 8);
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
