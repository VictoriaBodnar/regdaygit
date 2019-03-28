<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGrafsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grafs', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->bigInteger('kod_consumer');
            $table->date('date_zamer');
            $table->string('type_zamer');
            $table->bigInteger('a1')->default('0');
            $table->bigInteger('a2')->default('0');
            $table->bigInteger('a3')->default('0');
            $table->bigInteger('a4')->default('0');
            $table->bigInteger('a5')->default('0');
            $table->bigInteger('a6')->default('0');
            $table->bigInteger('a7')->default('0');
            $table->bigInteger('a8')->default('0');
            $table->bigInteger('a9')->default('0');
            $table->bigInteger('a10')->default('0');
            $table->bigInteger('a11')->default('0');
            $table->bigInteger('a12')->default('0');
            $table->bigInteger('a13')->default('0');
            $table->bigInteger('a14')->default('0');
            $table->bigInteger('a15')->default('0');
            $table->bigInteger('a16')->default('0');
            $table->bigInteger('a17')->default('0');
            $table->bigInteger('a18')->default('0');
            $table->bigInteger('a19')->default('0');
            $table->bigInteger('a20')->default('0');
            $table->bigInteger('a21')->default('0');
            $table->bigInteger('a22')->default('0');
            $table->bigInteger('a23')->default('0');
            $table->bigInteger('a24')->default('0');
            $table->bigInteger('a_cyt')->default('0');
            $table->integer('user_id')->unsigned();
            $table->timestamps();
////////////////////////////////////////////

      /*      Schema::create('subcategories', function (Blueprint $table) {
        $table->increments('id');
        $table->string('category_slug')->unique();
        $table->foreign('category_slug')
       ->references('slug')->on('categories')->onUpdate('cascade')
        ->onDelete('cascade');
        $table->timestamps();
  });*/
            ///////////////////////////////////////////////////////////////
            
            $table->foreign('kod_consumer')
                  ->references('kod_consumer')->on('consumers')
                  ->onDelete('restrict');
            /*$table->foreign('date_zamer')
                  ->references('date_zamer')->on('pasps')
                  ->onDelete('restrict'); */
            /*$table->foreign('type_zamer')
                  ->references('name_type')->on('types')
                  ->onDelete('restrict'); */           
            $table->foreign('user_id')
                  ->references('id')->on('users')
                  ->onDelete('restrict'); 
            $table->unique(['kod_consumer', 'date_zamer', 'type_zamer']);     

                     
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
        Schema::dropIfExists('grafs');
    }
}
