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
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->bigInteger('kod_consumer')->unique();
            $table->string('name_consumer',50)->unique();
            $table->integer('kod_grp')->default('0');
            $table->integer('kod_seti')->default('0');
            $table->integer('kod_rem')->unsigned();
            $table->integer('kod_otr')->unsigned();
            $table->integer('kod_podotr')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->timestamps();

            $table->foreign('user_id')
                  ->references('id')->on('users')
                  ->onDelete('restrict');
            $table->foreign('kod_rem')
                  ->references('id')->on('rems')
                  ->onDelete('restrict');
            $table->foreign('kod_otr')
                  ->references('id')->on('otrs')
                  ->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('consumers');
    }
}
