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
        Schema::create('registrations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('student_name');
            $table->string('nik', 16)->unique(); 
            $table->date('date_of_birth');
            $table->text('address');
            $table->enum('section', ['Kindergarten', 'Elementary', 'Middle School', 'High School']);
            $table->enum('grade', ['K', '1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12']);
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registrations');
    }
};
