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
        // Add hero_background_image setting
        DB::table('settings')->insert([
            'key' => 'hero_background_image',
            'value' => null,
            'type' => 'image',
            'group' => 'hero',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::table('settings')->where('key', 'hero_background_image')->delete();
    }
};
