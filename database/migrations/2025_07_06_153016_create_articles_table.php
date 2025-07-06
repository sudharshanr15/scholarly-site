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
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->foreignId("faculty_id")->constrained("users_faculty", "id", "articles_faculty_id");
            $table->string("title");
            $table->string("type")->nullable();
            $table->string("link");
            $table->string("indexed_in")->nullable();
            $table->string("published_year");
            $table->string("apa");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};
