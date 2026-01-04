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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->integer('post_category_id');
            $table->integer('user_id');
            $table->text('title');
            $table->text('slug');
            $table->text('short_description');
            $table->text('description');
            $table->text('photo');
            $table->text('banner');
            $table->integer('show_comment');
            $table->text('seo_title')->nullable();
            $table->text('seo_meta_description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
