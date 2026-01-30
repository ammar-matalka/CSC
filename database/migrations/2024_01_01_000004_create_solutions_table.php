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
        Schema::create('solutions', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->text('features')->nullable(); // JSON array of features
            $table->string('image')->nullable(); // path to image
            $table->string('icon')->default('fas fa-laptop-code'); // FontAwesome icon
            $table->integer('order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });

        // Insert default solutions
        DB::table('solutions')->insert([
            [
                'title' => 'IT Services & Web Development',
                'description' => 'Creativity is contagious. Pass it on! We can embark on turnkey projects. We start from scratch till we see your project to fruition. From the point of workflow charts till your software is up and running.',
                'features' => json_encode([
                    'Our Services and Technologies allow businesses to be more reliable, flexible, and scalable.',
                    'Our low-cost IT solutions afford you a competitive edge while delivering tangible results.'
                ]),
                'icon' => 'fas fa-laptop-code',
                'order' => 1,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'title' => 'Marketing & Leads Traffic',
                'description' => 'Our highly motivated team will support the progress of your business using a variety of processes like: digital marketing, SEO, telemarketing, customer service, email marketing, and calling data gathering.',
                'features' => json_encode([
                    'We offer the best agents that are well experienced in the field of marketing.',
                    'Our motto is Affordable Excellence.'
                ]),
                'icon' => 'fas fa-bullhorn',
                'order' => 2,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'title' => 'Mobile Applications',
                'description' => 'Our expertise will provide a strong design sensibility, extensive practical experience and abiding passion to build a creative mobile app for your business.',
                'features' => json_encode([
                    'We offer comprehensive, end-to-end mobile application solutions.',
                    'Next level of UX/UI design and creativity.'
                ]),
                'icon' => 'fas fa-mobile-alt',
                'order' => 3,
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
        Schema::dropIfExists('solutions');
    }
};
