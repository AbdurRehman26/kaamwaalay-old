<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTableJobBidsAddColumnIsVisitRequired extends Migration
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
                $table->integer('is_visit_required')->nullable()->default(NULL);
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
                $table->dropColumn('is_visit_required');
            }
        );
    }
}
