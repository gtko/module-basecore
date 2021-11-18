<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCountriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('countries', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('continent_id')->unsigned();
            $table->string('name', 255)->default('');
            $table->string('full_name', 255)->nullable();
            $table->string('capital', 255)->nullable();
            $table->string('code', 4)->nullable();
            $table->string('code_alpha3', 6)->nullable();
            $table->string('emoji', 16)->nullable();
            $table->boolean('has_division')->default(0);
            $table->string('currency_code', 3)->nullable();
            $table->string('currency_name', 128)->nullable();
            $table->string('tld', 8)->nullable();
            $table->string('callingcode', 8)->nullable();
            $table->unique(['continent_id','name'], 'uniq_country');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('countries');
    }
}
