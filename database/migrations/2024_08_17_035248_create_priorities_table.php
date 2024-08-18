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
        Schema::create('priorities', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('description');
            $table->timestamps();
        });

        \Illuminate\Support\Facades\DB::table('priorities')->insert([
            [
                'name' => 'Low',
                'description' => 'Low',
                'created_at' => now()
            ],
            [
                'name' => 'Medium',
                'description' => 'Medium',
                'created_at' => now()
            ],
            [
                'name' => 'High',
                'description' => 'High',
                'created_at' => now()
            ]
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('priorities');
    }
};
