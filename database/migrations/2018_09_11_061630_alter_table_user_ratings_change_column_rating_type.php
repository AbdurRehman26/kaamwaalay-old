<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTableUserRatingsChangeColumnRatingType extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {     
          DB::statement("ALTER TABLE `user_ratings` CHANGE COLUMN `rating` `rating` float");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
              DB::statement("ALTER TABLE `user_ratings` CHANGE COLUMN `rating` `rating` boolean");
    }
}
