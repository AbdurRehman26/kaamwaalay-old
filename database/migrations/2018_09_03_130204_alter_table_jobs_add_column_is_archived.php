<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTableJobsAddColumnIsArchived extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table(
            'jobs', function (Blueprint $table) {
                $table->integer('is_archived')->nullable()->default(0);
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
            'jobs', function (Blueprint $table) {
                $table->dropColumn('is_archived');
            }
        );
    }
}
