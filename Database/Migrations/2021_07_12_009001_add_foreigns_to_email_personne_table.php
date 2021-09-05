<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignsToEmailPersonneTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('email_personne', function (Blueprint $table) {
            $table
                ->foreign('email_id')
                ->references('id')
                ->on('emails')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');

            $table
                ->foreign('personne_id')
                ->references('id')
                ->on('personnes')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('email_personne', function (Blueprint $table) {
            $table->dropForeign(['email_id']);
            $table->dropForeign(['personne_id']);
        });
    }
}
