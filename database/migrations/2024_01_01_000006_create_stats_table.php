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
        Schema::create('stats', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('number'); // e.g., '5000+', '150+'
            $table->text('description')->nullable();
            $table->string('color')->default('blue'); // blue, purple, pink, green
            $table->integer('order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });

        // Insert default stats
        DB::table('stats')->insert([
            [
                'title' => 'Satisfied Clients',
                'number' => '5000+',
                'description' => 'We believe that our success is majored by your income',
                'color' => 'blue',
                'order' => 1,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'title' => 'Partnerships With Big Clients',
                'number' => '150+',
                'description' => 'Our Clients Become Partners To Work Together For The Long Term',
                'color' => 'purple',
                'order' => 2,
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
        Schema::dropIfExists('stats');
    }
};
