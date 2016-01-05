<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCurrenciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
            Schema::create('currencies', function(Blueprint $table) {
                $table->increments('id');
                $table->string('name');
$table->string('image');
$table->bigInteger('base_value');
$table->tinyInteger('convertable');
$table->tinyInteger('tradeable');
$table->tinyInteger('sellable');
$table->tinyInteger('rewardable');
$table->tinyInteger('discoverable');
$table->tinyInteger('itemize');
$table->string('notes');
$table->tinyInteger('available');
$table->string('type');

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
        Schema::drop('currencies');
    }
}
