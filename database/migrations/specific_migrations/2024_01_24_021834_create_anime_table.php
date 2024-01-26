<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('animes', function (Blueprint $table) {
            $table->id('id');
            $table->string('english_title');
            $table->string('japanese_title');
            $table->foreignId('author_id')->constrained('authors');
            $table->foreignId('genre_id')->constrained('genres');
            $table->foreignId('type_id')->constrained('types');
            $table->foreignId('platform_id')->constrained('platforms');
            $table->foreignId('collection_id')->constrained('collections');
            $table->float('ratings');
            $table->text('synopsis');
            $table->integer('episode_count');
            $table->date('release_date');
            $table->text('image_url');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('anime');
    }
};
