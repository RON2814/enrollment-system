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
        Schema::create('sections', function (Blueprint $table) {
            $table->id();
            $table->string("student_number");
            $table->foreignId("program_id")->constrained("programs");
            $table->string("section_name");
            $table->tinyInteger("current_student_enrolled")->unsigned();
            $table->tinyInteger("max_capacity")->unsigned();
            $table->timestamps();

            // Foreign keys
            $table->foreign("student_number")->references("student_number")->on("students")->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sections');
    }
};
