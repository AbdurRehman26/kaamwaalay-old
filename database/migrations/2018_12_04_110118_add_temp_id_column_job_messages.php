<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTempIdColumnJobMessages extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('job_messages', function (Blueprint $table) {
            $table->string('temp_id', 50)->nullable()->after('id');          
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('job_messages', function (Blueprint $table) {
            $table->dropColumn('temp_id');  
        });
    }
}
