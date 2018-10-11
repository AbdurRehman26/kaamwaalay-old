<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTableJobBidsAddColumnVisitTime extends Migration
{
/**
* Run the migrations.
*
* @return void
*/
public function up()
{

    Schema::table('job_bids', function (Blueprint $table) {
        $table->text('visit_details')->nullable();          
    });
}

/**
* Reverse the migrations.
*
* @return void
*/
public function down()
{
    Schema::table('job_bids', function (Blueprint $table) {
        $table->dropColumn('visit_details');          
    });
}
}
