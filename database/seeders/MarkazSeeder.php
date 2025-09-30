<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MarkazSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('markazs')->delete();
        $markazs = array(
            array('id' => 1, 'country_id' => 132, 'state_id' => 2322, 'city_id' => 27065, 'name' => "Seri Petaling", 'description' => ""),
        );
        DB::table('markazs')->insert($markazs);       
    }
}
