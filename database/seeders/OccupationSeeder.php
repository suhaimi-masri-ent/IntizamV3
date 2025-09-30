<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OccupationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('occupations')->delete();
        $occupations = array(
            array('id' => 1, 'occupation_name' => "Student"),
            array('id' => 2, 'occupation_name' => "Private"),
            array('id' => 3, 'occupation_name' => "Goverment"),
            array('id' => 4, 'occupation_name' => "Self Employ"),
            array('id' => 5, 'occupation_name' => "Unemploy"),
            array('id' => 6, 'occupation_name' => "Pensioner"),
        );
        DB::table('occupations')->insert($occupations);            
    }
}
