<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTableJobsAddColumnMapLatLng extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table(
            'jobs', function (Blueprint $table) {
                $table->decimal('address_latitude', 10, 8);
                $table->decimal('address_longitude', 10, 8);
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
            'jobs', function (Blueprint $table) {
                $table->dropColumn('address_latitude', 10, 8);
                $table->dropColumn('address_longitude', 10, 8);
            }
        );
    }
}
