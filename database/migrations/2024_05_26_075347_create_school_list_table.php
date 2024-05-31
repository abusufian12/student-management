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
        Schema::create('school_lists', function (Blueprint $table) {
            $table->id();
            $table->integer('school_type_id');
            $table->string('school_name');
            $table->string('school_post_code');
            $table->string('school_city');
            $table->string('school_ken');
            $table->string('school_address_line_1');
            $table->string('school_address_line_2');
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('school_list');
    }
};
