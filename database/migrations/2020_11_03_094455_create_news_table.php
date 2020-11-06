<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table
                ->string('title')
                ->nullable(false)
                ->comment('Заголовок новости');
            $table
                ->text('short_text')
                ->comment('Короткий текст новости');
            $table
                ->text('full_text')
                ->comment('Полный текст новости');
            $table
                ->string('photo', 2000)
                ->nullable(false)
                ->default('')
                ->comment('Ссылка на фотографию новости');
            $table
                ->foreignId('category_id')
                ->comment('ID категории. Внешний ключ на таблицу категорий')
                ->constrained('categories');
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
        Schema::dropIfExists('news');
    }
}
