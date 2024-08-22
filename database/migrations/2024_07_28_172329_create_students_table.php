<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id(); // Auto-incrementing ID column
            $table->string('name'); // Student's full name
            $table->string('email')->unique(); // Student's email
            $table->string('phone_number')->nullable(); // Student's phone number
            $table->string('father_name')->nullable(); // Father's name
            $table->string('mother_name')->nullable(); // Mother's name
            $table->string('father_phone')->nullable(); // Father's phone number
            $table->string('mother_phone')->nullable(); // Mother's phone number
            $table->string('profile_image')->nullable(); // Profile image (file path)
            $table->string('birth_certificate')->nullable();
            $table->string('passport_attachment')->nullable();
            $table->string('academic_certificates')->nullable();
            $table->string('nationality')->nullable(); // Student's nationality
            $table->text('address')->nullable(); // Student's address
            $table->string('course')->nullable(); // Course the student is enrolled in
            $table->string('preferred_country')->nullable(); // Preferred country for study
            $table->timestamps(); // Created_at and updated_at timestamps
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
}
