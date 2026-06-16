<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('blog_posts', function (Blueprint $table) {
            $table->text('excerpt')->nullable()->after('image');
            $table->string('category')->nullable()->after('excerpt');
            $table->json('tags')->nullable()->after('category');
            $table->string('author_name')->nullable()->after('tags');
            $table->string('author_role')->nullable()->after('author_name');
            $table->string('author_image')->nullable()->after('author_role');
            $table->string('reading_time')->nullable()->after('author_image');
            $table->json('content')->nullable()->after('reading_time');
        });
    }

    public function down(): void
    {
        Schema::table('blog_posts', function (Blueprint $table) {
            $table->dropColumn([
                'excerpt',
                'category',
                'tags',
                'author_name',
                'author_role',
                'author_image',
                'reading_time',
                'content',
            ]);
        });
    }
};
