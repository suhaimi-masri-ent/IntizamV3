<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MohallahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('mohallahs')->delete();
        $mohallahs = array(
            array('id' => 1, 'country_id' => 132, 'state_id' => 2322, 'city_id' => 27065, 'markaz_id' => 1, 'halqah_id' => 1,'name' => "Gombak", 'description' => ""),
        );
        DB::table('mohallahs')->insert($mohallahs);            

    }
}
