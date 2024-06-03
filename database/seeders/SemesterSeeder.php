<?php

namespace Database\Seeders;

use App\Models\Semester;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SemesterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('semesters')->insert([
            'id' => 1,
            'name' => '1st Semester',
        ]);

        DB::table('semesters')->insert([
            'id' => 2,
            'name' => '2nd Semester',
        ]);

        DB::table('semesters')->insert([
            'id' => 3,
            'name' => 'Summer',
        ]);
    }
}
