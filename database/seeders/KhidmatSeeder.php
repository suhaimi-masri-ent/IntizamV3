<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KhidmatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('khidmats')->delete();
        $khidmats = array(
            array('id' => 1, 'name' => "Faisalah"),
            array('id' => 2, 'name' => "Khatib"),
            array('id' => 3, 'name' => "Bayan Hidayat"),
            array('id' => 4, 'name' => "Bayan Tausiah dan Doa"),
            array('id' => 5, 'name' => "Taklilm Pagi"),
            array('id' => 6, 'name' => "Taklim Petang"),
            array('id' => 7, 'name' => "Jorna"),
            array('id' => 8, 'name' => "Bayan Asar"),
            array('id' => 9, 'name' => "Juru Kharguzari"),
            array('id' => 10, 'name' => "Tasykil"),
            array('id' => 11, 'name' => "Istiqbal"),
            array('id' => 12, 'name' => "Hayatus Sahabah"),
        );
        DB::table('khidmats')->insert($khidmats);   
    }
}
