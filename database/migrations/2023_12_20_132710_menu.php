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
        Schema::create('menu', function (Blueprint $table) {
            $table->id();
            $table->string('type')->nullable();
            $table->string('name')->nullable();
            $table->timestamps();
        });
        Schema::create('menu_items', function (Blueprint $table) {
            $table->id();
            $table->integer('menuID')->nullable();
            $table->integer('pageID')->nullable();
            $table->string('name')->nullable();
            $table->string('url')->nullable();
            $table->integer('rating')->default(0);
            $table->boolean('hide')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menu');
        Schema::dropIfExists('menu_items');
    }
};
