<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFoodItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('FoodItems', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            
            $table->string('name', 80);

            $table->integer('day_id'); // belongs to Days, one-to-many

            $table->tinyInteger('quantity')->nullable(); // amount available, subtracted if someone claims

            $table->tinyInteger('claimed')->nullable(); // amount claimed, added if someone claims

            $table->string('claimees')->nullable(); // unformatted string, mostly just for record keeping. Won't be shown on the front-end.

            $table->softDeletes(); // adds softDeletes column, which stores a date and indicates this item has been deleted.

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('FoodItems');
    }
}
