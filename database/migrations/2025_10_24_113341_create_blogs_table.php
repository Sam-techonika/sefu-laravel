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
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->string('locale', 5)->default('en');
            $table->foreignId('category_id')->nullable()->constrained()->cascadeOnDelete();
            $table->json('title'); 
            $table->string('featured_image')->nullable();
            $table->json('at_glance')->nullable(); 
            $table->json('introduction')->nullable();
            $table->json('main_content')->nullable();
            $table->json('key_takeaways')->nullable();
            $table->json('faqs')->nullable(); 
            $table->json('author')->nullable(); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blogs');
    }
};
