<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterStatusColumnJobBidTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        // used because laravel does't support change() in enum type
        DB::statement("ALTER TABLE job_bids CHANGE COLUMN status status ENUM('cancelled','completed','initiated','invited','on_the_way','pending','visit_allowed', 'suggested_time') NOT NULL DEFAULT 'pending'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement("ALTER TABLE job_bids CHANGE COLUMN status status ENUM('cancelled','completed','initiated','invited','on_the_way','pending','visit_allowed') NOT NULL DEFAULT 'pending'");
    }
}
