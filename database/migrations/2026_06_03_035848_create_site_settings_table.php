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
    Schema::create('site_settings', function (Blueprint $table) {

        $table->id();

        // General
        $table->string('site_name')->nullable();
        $table->string('tagline')->nullable();

        $table->string('logo')->nullable();
        $table->string('favicon')->nullable();

        // Contact
        $table->string('email')->nullable();
        $table->string('phone')->nullable();
        $table->string('whatsapp')->nullable();

        $table->text('address')->nullable();
        $table->text('google_maps')->nullable();

        // Social Media
        $table->string('instagram')->nullable();
        $table->string('facebook')->nullable();
        $table->string('linkedin')->nullable();
        $table->string('github')->nullable();
        $table->string('youtube')->nullable();
        $table->string('tiktok')->nullable();

        // SEO
        $table->string('meta_title')->nullable();
        $table->text('meta_description')->nullable();

        $table->string('og_image')->nullable();

        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('site_settings');
    }
};
