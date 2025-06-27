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
        Schema::create('users_faculty', function (Blueprint $table) {
            $table->id();
            $table->string("full_name");
            $table->string("email")->unique("unique_users_faculty_email");
            $table->string("password");
            $table->string("mobile");
            $table->string("google_scholarID")->nullable();
            $table->string("scopusID")->nullable();
            $table->string("wosID")->nullable();
            $table->string("orchidID")->nullable();
            $table->foreignId("department_id")->constrained("departments", "id", "users_faculty_department_id");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users_faculty');
    }
};
