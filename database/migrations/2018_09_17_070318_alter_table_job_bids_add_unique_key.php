<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTableJobBidsAddUniqueKey extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        DB::statement("ALTER TABLE `job_bids` CHANGE COLUMN `is_visit_required` `is_visit_required` boolean");
        DB::statement("ALTER TABLE `job_bids` ADD CONSTRAINT job_id_user_id_unique UNIQUE KEY(`job_id`,`user_id`)");

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement("ALTER TABLE `job_bids` CHANGE COLUMN `is_visit_required` `is_visit_required` int NULL");
        DB::statement("ALTER TABLE `job_bids` DROP INDEX job_id_user_id_unique");
  }
}
