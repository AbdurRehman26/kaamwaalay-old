<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTestimonialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table(
            'testimonials', function (Blueprint $table) {
                $table->dropColumn('author');
                $table->dropColumn('image');
                $table->integer('user_id')->unsigned()->index()->after('id');
                $table->foreign('user_id')->references('id')->on('users')->onUpdate('CASCADE')->onDelete('NO ACTION');
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
            'testimonials', function (Blueprint $table) {
                $table->string('author');
                $table->string('image')->nullable();
                $table->dropForeign('testimonials_user_id_foreign');
                $table->dropColumn('user_id');
            }
        );
    }
}
