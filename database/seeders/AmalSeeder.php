<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AmalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('amals')->delete();
        $amals = array(
            array('id' => 1, 'name' => "Mesyuarat/Fikir Harian", 'description' => ""),
        );
        DB::table('amals')->insert($amals);            
    }
}
