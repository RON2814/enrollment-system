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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->foreignId("user_id")->constrained("users")->onDelete("cascade");
            $table->string("first_name");
            $table->string("last_name");
            $table->string("middle_name");
            $table->string("contact_number");
            $table->foreignId("program_id")->constrained("programs");
            $table->enum("classification", ["regular", "irregular", "transferee", "returnee"]);
            $table->foreignId("address_id")->constrained("addresses")->onDelete("cascade");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
