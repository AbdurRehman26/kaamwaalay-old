<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSupportQuestionsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'support_questions', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('role_id')->unsigned()->index();
                $table->string('question');
                $table->timestamps();
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
        Schema::drop('support_questions');
    }

}
