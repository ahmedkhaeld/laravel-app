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
            // First, ensure the class_id column exists
            if (!Schema::hasColumn('students', 'class_id')) {
                $table->unsignedBigInteger('class_id')->after('id')->nullable();
            }

            // Then add the foreign key constraint
            $table->foreign('class_id')
                ->references('id')
                ->on('classes')
                ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('students', function (Blueprint $table) {
            $table->dropForeign(['class_id']);
            $table->dropColumn('class_id');
        });
    }
};
