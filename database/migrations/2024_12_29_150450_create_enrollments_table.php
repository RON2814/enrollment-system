<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('enrollments', function (Blueprint $table) {
            $table->id();
            $table->string("student_number");
            $table->foreignId("section_id")->constrained("sections");
            $table->year("academic_year");
            $table->string("course_code");
            $table->enum("status", ["enrolled", "pending", "dropped", "passed", "failed", "INC", "N/A"]);
            $table->string("registrar_encoder_id")->nullable();
            $table->timestamps();

            // Foreign keys
            $table->foreign("student_number")->references("student_number")->on("students")->onDelete('cascade');
            $table->foreign("course_code")->references("course_code")->on("courses");
            $table->foreign("registrar_encoder_id")->references("registrar_id")->on("registrars");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('enrollments');
    }
};
