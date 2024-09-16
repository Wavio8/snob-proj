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
        Schema::create('seo', function (Blueprint $table) {
            $table->id();
            $table->string('url')->nullable();
            $table->string('title')->nullable();
            $table->string('description')->nullable();
            $table->string('canonical')->nullable();
            $table->string('keywords')->nullable();
            $table->string('og_title')->nullable();
            $table->string('og_description')->nullable();
            $table->string('og_url')->nullable();
            $table->string('twitter_title')->nullable();
            $table->string('twitter_site')->nullable();
            $table->string('jsonld_title')->nullable();
            $table->string('jsonld_description')->nullable();
            $table->string('jsonld_type')->nullable();
            $table->string('og_image')->nullable();
            $table->string('isIndexLock')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('seo');
    }
};
