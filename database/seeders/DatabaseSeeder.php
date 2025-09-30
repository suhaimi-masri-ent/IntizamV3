<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@class01wap.local',
            'password' => Hash::make('P@55w0rd'),
        ]);

        $this->call(CountrySeeder::class);
        $this->call(StateSeeder::class);
        $this->call(CitySeeder::class);
        $this->call(MarkazSeeder::class);
        $this->call(HalqahSeeder::class);
        $this->call(MohallahSeeder::class);
        $this->call(OccupationSeeder::class);
        $this->call(MarriageSeeder::class);
        // $this->call(KhidmatSeeder::class);
        // $this->call(AmalSeeder::class);

    }
}
