<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MarriageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('marriages')->delete();
        $marriages = array(
            array('id' => 1, 'marriage_status' => "Single"),
            array('id' => 2, 'marriage_status' => "Married"),
            array('id' => 3, 'marriage_status' => "Divorced"),
        );
        DB::table('marriages')->insert($marriages);            
    }
}
