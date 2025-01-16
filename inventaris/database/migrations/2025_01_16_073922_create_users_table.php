<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Menjalankan migrasi untuk membuat tabel users.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });

        // Insert user pertama dengan role admin
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('password'), // Ubah password sesuai kebutuhan
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Assign role admin ke user pertama
        $user = \App\Models\User::where('email', 'admin@admin.com')->first();
        $adminRole = \Spatie\Permission\Models\Role::firstOrCreate(['name' => 'admin']);
        $user->assignRole($adminRole);  // Assign role admin
    }

    /**
     * Membalikkan perubahan di atas.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
