<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModifyServicesColumnUrlSeffixTable extends Migration
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
                $table->renameColumn('url_prefix', 'url_suffix')->change();
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
                $table->renameColumn('url_suffix', 'url_prefix')->change();
            }
        );
    }
}
