<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonnesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personnes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('address_id')->nullable();
            $table->string('firstname');
            $table->string('lastname')->nullable();
            $table->date('date_birth')->nullable();
            $table->string('company')->nullable();
            $table->enum('type', ['company', 'individual'])->default('individual');
            $table->enum('gender', ['male', 'female', 'other'])->default('male');
            $table->index('firstname');
            $table->index('lastname')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     *
     *
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('personnes');
    }
}
