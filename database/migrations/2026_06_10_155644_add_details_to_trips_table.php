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
            $table->string('duration')->nullable()->after('price');
            $table->string('location')->nullable()->after('duration');
            $table->decimal('rating', 2, 1)->nullable()->after('location');
            $table->unsignedInteger('reviews_count')->default(0)->after('rating');
            $table->string('destination_category')->nullable()->after('reviews_count');
            $table->string('trip_type')->nullable()->after('destination_category');
            $table->boolean('is_featured')->default(false)->after('trip_type');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('trips', function (Blueprint $table) {
            $table->dropColumn([
                'duration',
                'location',
                'rating',
                'reviews_count',
                'destination_category',
                'trip_type',
                'is_featured',
            ]);
        });
    }
};
