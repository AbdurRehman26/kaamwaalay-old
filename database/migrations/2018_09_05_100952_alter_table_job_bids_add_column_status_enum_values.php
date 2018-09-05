<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTableJobBidsAddColumnStatusEnumValues extends Migration
{

   /**
     * Run the migrations.
     *
     * @return void
     */
   public function up()
   {
    DB::statement("ALTER TABLE `job_bids` CHANGE COLUMN `status` `status` ENUM('cancelled','pending','completed','invited','on_the_way', 'initaited') DEFAULT 'pending'");
}

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement("ALTER TABLE `job_bids` CHANGE COLUMN `status` `status` ENUM('cancelled','pending','completed','invited','on_the_way') DEFAULT 'pending'");
    }
}
