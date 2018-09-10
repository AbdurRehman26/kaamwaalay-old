<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterNameColumnPlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
          DB::statement("ALTER TABLE `plans` CHANGE COLUMN `name` `product` ENUM('featured_profile','urgent_job','account_creation')");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('plans', function (Blueprint $table) {
             $table->dropColumn('product');
              $table->string('name', 50)->nullable();
        });
    }
}
