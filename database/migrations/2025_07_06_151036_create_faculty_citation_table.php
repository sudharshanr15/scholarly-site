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
        Schema::create('faculty_citation', function (Blueprint $table) {
            $table->id();
            $table->foreignId("faculty_id")->constrained("users_faculty", "id", "faculty_citation_faculty_id");
            $table->string("g_total_citation");
            $table->string("g_h_index");
            $table->string("g_i10");
            $table->string("s_total_citation")->nullable();
            $table->string("s_h_index")->nullable();
            $table->string("s_i10")->nullable();
            $table->string("wos_total_citation")->nullable();
            $table->string("wos_h_index")->nullable();
            $table->string("wos_i10")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('faculty_citation');
    }
};
