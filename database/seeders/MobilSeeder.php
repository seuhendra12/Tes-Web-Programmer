<?php

namespace Database\Seeders;

use App\Models\Mobil;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MobilSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    $mobils = [
      [
        'merek' => 'Toyota',
        'model' => 'Camry',
        'plat' => 'D 1234 AB',
        'harga_sewa' => 250000,
      ], [
        'merek' => 'Honda',
        'model' => 'Civic',
        'plat' => 'B 5678 CD',
        'harga_sewa' => 300000,
      ],
    ];

    foreach ($mobils as $mobil) {
      Mobil::create([
        'merek' => $mobil['merek'],
        'model' => $mobil['model'],
        'plat' => $mobil['plat'],
        'harga_sewa' => $mobil['harga_sewa'],
        'created_at' => \Carbon\Carbon::now(),
        'updated_at' => \Carbon\Carbon::now(),
      ]);
    }
  }
}
