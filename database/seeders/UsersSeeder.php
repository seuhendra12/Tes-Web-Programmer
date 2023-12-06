<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {

    $users = [
      [
        'no_sim' => '1234567890',
        'nama' => 'Administrator',
        'role' => 'admin',
        'alamat' => 'Jalan Sawang',
        'no_telp' => '081234567890',
        'password' => Hash::make('Admin12345'),
      ],[
        'no_sim' => '0987654321',
        'nama' => 'Pengguna 1',
        'role' => 'user',
        'alamat' => 'Jalan Kobel',
        'no_telp' => '081234567890',
        'password' => Hash::make('User12345'),
      ],
    ];

    foreach ($users as $userData) {
      User::create([
        'no_sim' => $userData['no_sim'],
        'nama' => $userData['nama'],
        'role' => $userData['role'],
        'alamat' => $userData['alamat'],
        'no_telp' => $userData['no_telp'],
        'password' => $userData['password'],
        'created_at' => \Carbon\Carbon::now(),
        'updated_at' => \Carbon\Carbon::now(),
      ]);
    }
  }
}
