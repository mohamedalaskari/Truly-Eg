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
            $table->string('group_size')->nullable()->after('trip_type');
            $table->json('accommodations')->nullable()->after('gallery');
            $table->json('rating_breakdown')->nullable()->after('accommodations');
            $table->json('reviews')->nullable()->after('rating_breakdown');
            $table->json('faqs')->nullable()->after('reviews');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('trips', function (Blueprint $table) {
            $table->dropColumn([
                'group_size',
                'accommodations',
                'rating_breakdown',
                'reviews',
                'faqs',
            ]);
        });
    }
};
