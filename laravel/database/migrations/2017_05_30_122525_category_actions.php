<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CategoryActions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //many to many save

        Schema::create('categories_actions', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('category_id');
            $table->integer('action_id');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories_actions');

    }
}
