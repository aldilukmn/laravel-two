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
        Schema::create('students', function (Blueprint $table) {
            $table->char('id_student', 11);
            $table->string('fullName', 100);
            $table->enum('gender', ['M', 'F']);
            $table->string('address', 100);
            $table->string('email', 100);
            $table->char('phone', 20);
            $table->primary('id_student');
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
