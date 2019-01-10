<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSuggestedDateSuggestedTimeColumnsJobBidTable extends Migration
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
                $table->date('suggested_date')->nullable()->after('preferred_time');
                $table->time('suggested_time')->nullable()->after('suggested_date');
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
                $table->dropColumn('suggested_date');
                $table->dropColumn('suggested_time');
            }
        );
    }
}
