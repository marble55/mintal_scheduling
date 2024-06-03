<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AcademicCalendarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("school_year")->insert([
            'id' => 1,
            'academic_year'=> '2024-2025',
        ]);

        DB::table("academic_year_configs")->insert([
            'id' => 1,
            'current_semester'=> 1,
            'current_school_year' => 1,
        ]);
    }
}