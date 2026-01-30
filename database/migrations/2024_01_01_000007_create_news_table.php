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
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('excerpt'); // short description
            $table->text('content'); // full content
            $table->string('image')->nullable(); // featured image
            $table->date('published_at');
            $table->string('slug')->unique();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });

        // Insert default news
        DB::table('news')->insert([
            [
                'title' => 'CSC Beyond attends an HR collaboration with Orange Jordan',
                'excerpt' => 'CSC Beyond took part in a collaborative HR-focused event hosted...',
                'content' => 'CSC Beyond took part in a collaborative HR-focused event hosted by Orange Jordan. The event brought together industry leaders to discuss modern HR practices and talent management strategies.',
                'published_at' => '2025-06-23',
                'slug' => 'csc-beyond-attends-hr-collaboration-orange-jordan',
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'title' => 'CSC Beyond meets with the Royal Medical Services',
                'excerpt' => 'CSC Beyond recently convened with leadership from Jordan\'s Royal Medical...',
                'content' => 'CSC Beyond recently convened with leadership from Jordan\'s Royal Medical Services to explore potential partnerships and technology solutions for healthcare improvement.',
                'published_at' => '2025-06-21',
                'slug' => 'csc-beyond-meets-royal-medical-services',
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'title' => 'ArvoFin: AI-Driven Fintech Platform',
                'excerpt' => 'CSC Beyond Powers the Development of ArvoFin, a New AI-Driven...',
                'content' => 'CSC Beyond Powers the Development of ArvoFin, a New AI-Driven Fintech Platform for Wealth Advisors. This innovative platform leverages artificial intelligence to provide wealth management solutions.',
                'published_at' => '2025-07-31',
                'slug' => 'arvofin-ai-driven-fintech-platform',
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('news');
    }
};
