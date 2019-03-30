<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaspsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pasps', function (Blueprint $table) {
            $table->increments('id');
            $table->date('date_zamer')->unique();
            $table->integer('user_id')->unsigned();
            $table->timestamps();
            
            $table->foreign('user_id')
                  ->references('id')->on('users')
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
        Schema::dropIfExists('pasps');
    }
}
