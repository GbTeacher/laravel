<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableAddSocAuth extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('email')->nullable(true)->change();
            $table->string('id_in_soc')
                ->default('')
                ->comment('ID в социальной сети');
            $table->enum('type_auth', ['site', 'vk', 'facebook'])
                ->default('site')
                ->comment('Какой тип авторизации использует пользователь');
            $table->string('avatar', 2000)->default('')->comment('Ссылка на аватар');
            $table->index('id_in_soc');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['id_in_soc', 'type_auth', 'avatar']);
        });
    }
}
