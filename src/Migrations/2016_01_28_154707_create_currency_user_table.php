<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCurrencyUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('currency_user', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->default(0)->index();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            if (Schema::hasTable('characters')) {
                $table->integer('character_id')->unsigned()->default(0)->index();
                $table->foreign('character_id')->references('id')->on('characters')->onDelete('cascade');
                $table->unique( ['user_id', 'character_id', 'currency_id'] );
            } else {
                $table->unique( ['user_id', 'currency_id'] );
            }
            $table->integer('currency_id')->unsigned()->index();
            $table->bigInteger('quantity')->index();
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
        Schema::drop('currency_user');
    }
}
