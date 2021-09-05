<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignsToPersonnePhoneTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('personne_phone', function (Blueprint $table) {
            $table
                ->foreign('phone_id')
                ->references('id')
                ->on('phones')
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
        Schema::table('personne_phone', function (Blueprint $table) {
            $table->dropForeign(['phone_id']);
            $table->dropForeign(['personne_id']);
        });
    }
}
