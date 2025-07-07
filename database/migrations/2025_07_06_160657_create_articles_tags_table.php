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
        Schema::create('articles_tags', function (Blueprint $table) {
            $table->id();
            $table->foreignId("article_id")->constrained("articles", "id", "fk_articles_tags_article_id");
            $table->foreignId("tag_id")->constrained("tags", "id", "fk_tag_id");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articles_tags');
    }
};
