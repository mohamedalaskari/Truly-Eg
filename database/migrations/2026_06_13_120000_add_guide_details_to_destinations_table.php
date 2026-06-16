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
        Schema::table('destinations', function (Blueprint $table) {
            $table->text('history')->nullable()->after('description');
            $table->json('gallery')->nullable()->after('image');
            $table->json('attractions')->nullable()->after('history');
            $table->json('cultural_experiences')->nullable()->after('attractions');
            $table->json('travel_tips')->nullable()->after('cultural_experiences');
            $table->text('conclusion')->nullable()->after('travel_tips');
            $table->json('info')->nullable()->after('conclusion');
            $table->json('map_position')->nullable()->after('info');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('destinations', function (Blueprint $table) {
            $table->dropColumn([
                'history',
                'gallery',
                'attractions',
                'cultural_experiences',
                'travel_tips',
                'conclusion',
                'info',
                'map_position',
            ]);
        });
    }
};
