<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCanRegisterColumnRoleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table(
            'roles', function (Blueprint $table) {
                $table->boolean('can_register')->nullable()->default(0)->after('title');
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
            'roles', function (Blueprint $table) {
                $table->dropColumn('can_register');
            }
        );
    }
}
