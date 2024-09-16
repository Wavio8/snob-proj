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
        Schema::create('users_class', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });
        DB::table('users_class')->insert(
            [
                [
                    'id' => '1',
                    'name' => 'Администратор'
                ],
                [
                    'id' => '2',
                    'name' => 'Модератор'
                ]
            ]
        );



        Schema::create('admin_access_rights', function (Blueprint $table) {
            $table->id();
            $table->string('path');
            $table->string('type');
            $table->string('user_class_id');
            $table->timestamps();
        });



        DB::table('admin_access_rights')->insert([
            [
                'path' => 'settings',
                'type' => 'read',
                'user_class_id' => '1',
            ],
            [
                'path' => 'settings',
                'type' => 'edit',
                'user_class_id' => '1',
            ],
            [
                'path' => 'settings',
                'type' => 'delete',
                'user_class_id' => '1',
            ]
        ]);
        DB::table('admin_access_rights')->insert([
            [
                'path' => 'settings',
                'type' => 'read',
                'user_class_id' => '2',
            ]
        ]);


        DB::table('admin_access_rights')->insert([
            [
                'path' => 'users.users',
                'type' => 'read',
                'user_class_id' => '1',
            ],
            [
                'path' => 'users.users',
                'type' => 'edit',
                'user_class_id' => '1',
            ],
            [
                'path' => 'users.users',
                'type' => 'delete',
                'user_class_id' => '1',
            ]
        ]);
        DB::table('admin_access_rights')->insert([
            [
                'path' => 'users.classes',
                'type' => 'read',
                'user_class_id' => '1',
            ],
            [
                'path' => 'users.classes',
                'type' => 'edit',
                'user_class_id' => '1',
            ],
            [
                'path' => 'users.classes',
                'type' => 'delete',
                'user_class_id' => '1',
            ]
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users_class');
        Schema::dropIfExists('admin_access_rights');
    }
};
