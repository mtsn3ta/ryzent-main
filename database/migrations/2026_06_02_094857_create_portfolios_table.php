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

        $table->string('title');
        $table->string('slug')->unique();

        $table->string('thumbnail')->nullable();

        $table->json('gallery_images')->nullable();

        $table->text('excerpt')->nullable();

        $table->longText('content')->nullable();

        $table->enum('category', [
            'SaaS',
            'Website Sekolah',
            'Website Olahraga',
            'AI Platform',
            'Custom Software',
        ]);

        $table->enum('status', [
            'Development',
            'Active',
            'Coming Soon',
        ])->default('Development');

        $table->string('demo_url')->nullable();

        $table->string('github_url')->nullable();

        $table->integer('sort_order')->default(0);

        $table->boolean('is_featured')->default(false);

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
