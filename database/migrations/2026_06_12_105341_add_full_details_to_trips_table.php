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
        Schema::table('trips', function (Blueprint $table) {
            $table->text('description')->nullable()->after('is_featured');
            $table->json('highlights')->nullable()->after('description');
            $table->json('itinerary')->nullable()->after('highlights');
            $table->json('includes')->nullable()->after('itinerary');
            $table->json('excludes')->nullable()->after('includes');
            $table->json('gallery')->nullable()->after('excludes');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('trips', function (Blueprint $table) {
            $table->dropColumn([
                'description',
                'highlights',
                'itinerary',
                'includes',
                'excludes',
                'gallery',
            ]);
        });
    }
};
