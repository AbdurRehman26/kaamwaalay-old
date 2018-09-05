<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTableZipCodesChangeColumnLong extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table(
            'zip_codes', function (Blueprint $table) {
                $table->decimal('longitude', 11, 8)->change();
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
            'zip_codes', function (Blueprint $table) {
                $table->decimal('longitude', 10, 8)->change();
            }
        );
    }
}
