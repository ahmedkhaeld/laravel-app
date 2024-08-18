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
        Schema::table('students', function (Blueprint $table) {
            // Check if the foreign key constraint exists before dropping
            if (Schema::hasColumn('students', 'class_id')) {
                $table->dropConstrainedForeignId('class_id');
            }

            // Add the new column if it doesn't exist
            if (!Schema::hasColumn('students', 'class_room_id')) {
                $table->unsignedBigInteger('class_room_id')->nullable();
            }

            // Add the new foreign key constraint
            $table->foreign('class_room_id')
                ->references('id')
                ->on('class_rooms')
                ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('students', function (Blueprint $table) {
            // Drop the foreign key constraint and column
            $table->dropConstrainedForeignId('class_room_id');

            // Add back the original column if it doesn't exist
            if (!Schema::hasColumn('students', 'class_id')) {
                $table->unsignedBigInteger('class_id')->nullable();
            }

            // Add the foreign key constraint back on class_id
            $table->foreign('class_id')
                ->references('id')
                ->on('class_rooms')
                ->onDelete('set null');
        });
    }
};
