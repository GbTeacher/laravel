<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('news', function (Blueprint $table) {
            $table
                ->string('source_guid', 2000)
                ->nullable(true)
                ->default(null);
            $table
                ->foreignId('source_id')
                ->nullable(true)
                ->default(null)
                ->constrained('sources');
            $table
                ->string('link', 2000)
                ->nullable(true)
                ->default(null);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('news', function (Blueprint $table) {
            $table->dropColumn(['source_id', 'source_guid', 'link']);
        });
    }
}
