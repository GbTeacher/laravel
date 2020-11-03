<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table
                ->string('name')
                ->nullable(false)
                ->comment('Название категории');
            $table
                ->string('description', 1000)
                ->default('')
                ->nullable(false)
                ->comment('Описание категории');
            $table
                ->string('photo', 2000)
                ->nullable(false)
                ->default('')
                ->comment('Ссылка на фотографию категории');
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
        Schema::dropIfExists('categories');
    }
}
