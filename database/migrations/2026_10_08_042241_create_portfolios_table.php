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
        Schema::create('portfolios', function (Blueprint $table) {

            $table->id();

            // Personal Information
            $table->string('full_name');
            $table->string('email');
            $table->string('contact_number')->nullable();
            $table->text('address')->nullable();
            $table->string('profile_picture')->nullable();

            // About
            $table->text('about_me')->nullable();

            // Education and Experience
            $table->longText('educational_background')->nullable();
            $table->longText('work_experience')->nullable();

            // Skills and Projects
            $table->longText('skills')->nullable();
            $table->longText('projects')->nullable();

            // Social Media and Websites
            $table->string('website')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('github')->nullable();
            $table->text('social_links')->nullable();

            // Additional Information
            $table->longText('additional_info')->nullable();

            // Selected Portfolio Template
            $table->string('template')->default('simple');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('portfolios');
    }
};