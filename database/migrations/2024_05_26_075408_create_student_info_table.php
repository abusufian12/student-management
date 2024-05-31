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
        Schema::create('student_infos', function (Blueprint $table) {
            $table->id();
            $table->integer('school_type_id');
            $table->integer('school_name_id');
            $table->string('student_name');
            $table->string('student_gender');
            $table->string('student_contact_number');
            $table->string('student_graduation');
            $table->string('student_fb_id');
            $table->string('student_country');
            $table->string('student_apartment');
            $table->string('school_address_line_1');
            $table->string('school_address_line_2');
            $table->string('year');
            $table->string('session');
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_info');
    }
};
