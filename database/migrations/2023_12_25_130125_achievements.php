<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('achievements', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('image')->nullable();
            $table->boolean('hide')->default(false);
            $table->timestamps();
        });

        DB::table('achievements')->insert(
            [
                [
                    'name' => 'Сертификат1',
                ],
                [
                    'name' => 'Сертификат2',
                ],
                [
                    'name' => 'Сертификат3',
                ],
                [
                    'name' => 'Сертификат4',
                ],

            ]
        );
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('achievements');
    }
};
