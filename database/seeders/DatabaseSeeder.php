<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database. //initiation des données dans la base de données
     */
    public function run(): void
    {
      \App\Models\User::factory(1000)->create();

      $this->call(EventSeeder::class);
      $this->call(AttendeeSeeder::class);
    }
}
