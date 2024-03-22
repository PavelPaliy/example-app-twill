<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('authors', function (Blueprint $table) {
            // this will create an id, a "published" column, and soft delete and timestamps columns
            createDefaultTableFields($table);
            
            $table->integer('position')->unsigned()->nullable();
            
            // add those 2 columns to enable publication timeframe fields (you can use publish_start_date only if you don't need to provide the ability to specify an end date)
            // $table->timestamp('publish_start_date')->nullable();
            // $table->timestamp('publish_end_date')->nullable();
        });

        Schema::create('author_translations', function (Blueprint $table) {
            createDefaultTranslationsTableFields($table, 'author');
            $table->string('title', 200)->nullable();
            $table->text('description')->nullable();
        });

        Schema::create('author_slugs', function (Blueprint $table) {
            createDefaultSlugsTableFields($table, 'author');
        });

        Schema::create('author_revisions', function (Blueprint $table) {
            createDefaultRevisionsTableFields($table, 'author');
        });
    }

    public function down()
    {
        Schema::dropIfExists('author_revisions');
        Schema::dropIfExists('author_translations');
        Schema::dropIfExists('author_slugs');
        Schema::dropIfExists('authors');
    }
};
