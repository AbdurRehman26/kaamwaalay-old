<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTableJobBidsAddAmountType extends Migration
{
/**
* Run the migrations.
*
* @return void
*/
public function up()
{
    Schema::table('job_bids', function (Blueprint $table) {
        $table->enum('amount_type', array('max','min', 'fixed'))->default('min');
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
        $table->dropColumn('amount_type');
    });

}
}
