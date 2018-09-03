<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModifyServiceTableParentidColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table(
            'services', function (Blueprint $table) {
                $table->integer('parent_id')->nullable()->default(NULL)->change();
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
            'services', function (Blueprint $table) {
                $table->integer('parent_id')->nullable()->default(0)->change();
            }
        );
    }
}
