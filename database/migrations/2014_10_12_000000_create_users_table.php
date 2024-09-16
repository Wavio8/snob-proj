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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('email')->unique();
            $table->string('password');
            $table->integer('class')->nullable();
            $table->boolean('sudo')->default(false);
            $table->rememberToken();
            $table->timestamps();
        });


        DB::table('users')->insert([
            [
                'email' => 'admin',
                'password' => '$2y$12$fXYwnsDr8O1wGWFrFeG0pOfnI/6iH7NDW2nwmEjhvIPJIoB1dLMPG',
                'class' => 1,
                'sudo' => true,
            ],
            [
                'email' => 'manager',
                'password' => '$2y$12$Tn3hA4rVgZqnP6Y1LjF4Fe526HS/lZQhZEA8ktIksRqZzrqa1YL2e',
                'class' => 2,
                'sudo' => false,
            ]
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
