<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToSupportInquiriesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table(
            'support_inquiries', function (Blueprint $table) {
                $table->foreign('user_id')->references('id')->on('users')->onUpdate('CASCADE')->onDelete('NO ACTION');
                $table->foreign('support_question_id')->references('id')->on('support_questions')->onUpdate('CASCADE')->onDelete('NO ACTION');
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
            'support_inquiries', function (Blueprint $table) {
                $table->dropForeign('support_inquiries_user_id_foreign');
                $table->dropForeign('support_inquiries_support_question_id_foreign');
            }
        );
    }

}
