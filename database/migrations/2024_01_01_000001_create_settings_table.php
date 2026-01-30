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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('key')->unique(); // hero_title, hero_description, vision_text, etc.
            $table->text('value')->nullable();
            $table->string('type')->default('text'); // text, textarea, image, number
            $table->string('group')->default('general'); // hero, vision, contact, footer
            $table->timestamps();
        });

        // Insert default settings
        DB::table('settings')->insert([
            // Hero Section
            ['key' => 'hero_title', 'value' => 'Helping Your Business', 'type' => 'text', 'group' => 'hero', 'created_at' => now(), 'updated_at' => now()],
            ['key' => 'hero_subtitle', 'value' => 'Expand Beyond', 'type' => 'text', 'group' => 'hero', 'created_at' => now(), 'updated_at' => now()],
            ['key' => 'hero_description', 'value' => 'We are a group of people and a dedicated company focused on delivering the best results for our clients.', 'type' => 'textarea', 'group' => 'hero', 'created_at' => now(), 'updated_at' => now()],
            
            // Vision Section
            ['key' => 'vision_title', 'value' => 'Our Vision', 'type' => 'text', 'group' => 'vision', 'created_at' => now(), 'updated_at' => now()],
            ['key' => 'vision_text', 'value' => 'With our close strong ties between the United States and the Middle East, we can offer Companies the opportunity to retain complete control and ownership of their out-sourcing projects and the entrepreneurial ability necessary for companies seeking to open private Facilities.', 'type' => 'textarea', 'group' => 'vision', 'created_at' => now(), 'updated_at' => now()],
            
            // Contact Info
            ['key' => 'contact_email', 'value' => 'info@cscbeyond.com', 'type' => 'text', 'group' => 'contact', 'created_at' => now(), 'updated_at' => now()],
            ['key' => 'contact_phone', 'value' => '919-324-6505', 'type' => 'text', 'group' => 'contact', 'created_at' => now(), 'updated_at' => now()],
            ['key' => 'contact_hours', 'value' => 'Mon-Fri: 7:00 AM – 7:00 PM', 'type' => 'text', 'group' => 'contact', 'created_at' => now(), 'updated_at' => now()],
            
            // Footer
            ['key' => 'footer_text', 'value' => 'Helping Your Business Expand', 'type' => 'text', 'group' => 'footer', 'created_at' => now(), 'updated_at' => now()],
            ['key' => 'copyright_text', 'value' => '© 2005-2026 CSC Beyond. All Rights Reserved', 'type' => 'text', 'group' => 'footer', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
