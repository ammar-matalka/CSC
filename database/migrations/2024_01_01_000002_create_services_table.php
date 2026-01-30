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
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->string('icon'); // FontAwesome icon class (e.g., 'fas fa-headset')
            $table->string('color')->default('blue'); // blue, purple, pink, green, yellow, red
            $table->integer('order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });

        // Insert default services
        DB::table('services')->insert([
            [
                'title' => 'Call Center',
                'description' => 'The best agents to provide the best results for any telemarketing campaign. We can do it all',
                'icon' => 'fas fa-headset',
                'color' => 'blue',
                'order' => 1,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'title' => 'Web Design & Development',
                'description' => 'Creativity is contagious. Pass it on! We can embark on turnkey projects from scratch to fruition',
                'icon' => 'fas fa-laptop-code',
                'color' => 'purple',
                'order' => 2,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'title' => 'Mobile Applications',
                'description' => 'Extensive practical experience and abiding passion to build a creative mobile app for your business',
                'icon' => 'fas fa-mobile-alt',
                'color' => 'pink',
                'order' => 3,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'title' => 'A.I & Semantic Technology',
                'description' => 'With our customization A.I. solutions, we leap into the future where we stand unique',
                'icon' => 'fas fa-brain',
                'color' => 'green',
                'order' => 4,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'title' => 'Digital Marketing',
                'description' => 'Can bring your website ranking to the top and more sales to come',
                'icon' => 'fas fa-chart-line',
                'color' => 'yellow',
                'order' => 5,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'title' => 'Technical Support',
                'description' => 'We have the best engineers that are available 24/7 at demand. Any Time, anywhere',
                'icon' => 'fas fa-tools',
                'color' => 'red',
                'order' => 6,
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
        Schema::dropIfExists('services');
    }
};
