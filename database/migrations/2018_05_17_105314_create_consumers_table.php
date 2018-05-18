<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConsumersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consumers', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('kod_consumer')->unique();
            $table->string('name_consumer',50)->unique();
            $table->integer('kod_grp')->default('0');
            $table->integer('kod_seti')->default('0');
            $table->integer('kod_rem')->default('0');
            $table->integer('kod_otr')->default('0');
            $table->integer('kod_podotr')->default('0');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('consumers');
    }
}
