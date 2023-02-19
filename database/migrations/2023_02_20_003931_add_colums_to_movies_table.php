<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumsToMoviesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('movies', function (Blueprint $table) {
            //
            $table->text('description')->after('image_url')->comment('概要');
            $table->boolean('is_showing')->default(false)->after('image_url')->comment('上映中かどうか');
            $table->integer('published_year')->after('image_url')->comment('公開年');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('movies', function (Blueprint $table) {
            //
            $table->dropColumn('published_year');
            $table->dropColumn('is_showing');
            $table->dropColumn('description');
        });
    }
}
