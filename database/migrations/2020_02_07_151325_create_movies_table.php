<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMoviesTable extends Migration
{
    /**
     * @return void
     */
    public function up()
    {
        Schema::create('movies', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('vote_count')->unsigned();
            $table->float('vote_average', 2, 1)->unsigned();
            $table->string('title', 150);
            $table->string('original_title', 150);
            $table->string('original_language', 4);
            $table->boolean('adult');
            $table->string('poster_path')->nullable();
            $table->text('overview', 65535)->nullable();
            $table->date('release_date');
            $table->float('popularity', 5, 3);
        });
    }

    /**
     * @return void
     */
    public function down()
    {
        Schema::drop('movies');
    }
}
