<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddJobDoneImagesColumnJobBidTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table(
            'job_bids', function (Blueprint $table) {
                $table->json('job_done_images', 65535)->nullable()->after('preferred_time');
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
            'job_bids', function (Blueprint $table) {
                $table->dropColumn('job_done_images');
            }
        );
    }
}
