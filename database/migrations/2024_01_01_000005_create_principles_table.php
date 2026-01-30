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
        Schema::create('principles', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description')->nullable();
            $table->integer('number'); // 1, 2, 3, 4, 5
            $table->string('color')->default('blue'); // blue, purple, pink, yellow, green
            $table->integer('order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });

        // Insert default principles
        DB::table('principles')->insert([
            ['title' => 'Integrity', 'description' => null, 'number' => 1, 'color' => 'blue', 'order' => 1, 'is_active' => true, 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Quality', 'description' => null, 'number' => 2, 'color' => 'purple', 'order' => 2, 'is_active' => true, 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Project Planning', 'description' => null, 'number' => 3, 'color' => 'pink', 'order' => 3, 'is_active' => true, 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Attention to Detail', 'description' => null, 'number' => 4, 'color' => 'yellow', 'order' => 4, 'is_active' => true, 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Time Management', 'description' => null, 'number' => 5, 'color' => 'green', 'order' => 5, 'is_active' => true, 'created_at' => now(), 'updated_at' => now()],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('principles');
    }
};
