<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTableJobBidsAddEnumStatus extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("ALTER TABLE `job_bids` CHANGE COLUMN `status` `status` ENUM('cancelled','completed', 'initiated', 'invited', 'on_the_way', 'pending', 'visit_allowed')");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement("ALTER TABLE `job_bids` CHANGE COLUMN `status` `status` ENUM('cancelled','completed', 'initiated', 'invited', 'on_the_way', 'pending')");
    }
}
