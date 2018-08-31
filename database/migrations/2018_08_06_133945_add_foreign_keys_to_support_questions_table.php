<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToSupportQuestionsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table(
            'support_questions', function (Blueprint $table) {
                $table->foreign('role_id')->references('id')->on('roles')->onUpdate('CASCADE')->onDelete('NO ACTION');
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
            'support_questions', function (Blueprint $table) {
                $table->dropForeign('support_questions_role_id_foreign');
            }
        );
    }

}
