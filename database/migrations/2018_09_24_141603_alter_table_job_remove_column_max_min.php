<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTableJobRemoveColumnMaxMin extends Migration
{
/**
* Run the migrations.
*
* @return void
*/
public function up()
{
    Schema::table('jobs', function ($table) {
        $table->dropColumn('min_amount');
        $table->dropColumn('max_amount');
    });
}

/**
* Reverse the migrations.
*
* @return void
*/
public function down()
{
    Schema::table('jobs', function ($table) {
        $table->decimal('min_amount', 10, 2)->nullable();
        $table->decimal('max_amount', 10, 2)->nullable();

    });
}
}
