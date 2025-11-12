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
        Schema::table('blog_translations', function (Blueprint $table) {
            if (!Schema::hasColumn('blog_translations', 'meta_title')) {
                $table->string('meta_title')->nullable()->after('tags');
            }
            if (!Schema::hasColumn('blog_translations', 'meta_description')) {
                $table->string('meta_description')->nullable()->after('meta_title');
            }
            if (!Schema::hasColumn('blog_translations', 'meta_keywords')) {
                $table->string('meta_keywords')->nullable()->after('meta_description');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
public function down(): void
    {
        Schema::table('blog_translations', function (Blueprint $table) {
            if (Schema::hasColumn('blog_translations', 'meta_keywords')) {
                $table->dropColumn('meta_keywords');
            }
            if (Schema::hasColumn('blog_translations', 'meta_description')) {
                $table->dropColumn('meta_description');
            }
            if (Schema::hasColumn('blog_translations', 'meta_title')) {
                $table->dropColumn('meta_title');
            }
        });
    }
};
