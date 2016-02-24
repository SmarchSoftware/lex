<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;


class CreateCharacterCurrencyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('character_currency', function (Blueprint $table) {
         
            $character = config('lex.characters');

            $table->increments('id');
            $table->integer($character['pivot'])->unsigned()->default(0)->index();
            $table->foreign($character['pivot'])->references($character['key'])->on($character['table'])->onDelete('cascade');
            $table->unique( [$character['pivot'], 'currency_id'] );
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
        Schema::drop('character_currency');
    }
}
