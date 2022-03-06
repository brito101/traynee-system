<?php

namespace Database\Seeders;

use DateTime;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ScholaritiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('scholarities')->insert(
            [
                [
                    'name' => 'Médio',
                    'acronym' => 'M',
                    'user_id' => 1,
                    'created_at' => new DateTime('now')
                ],
                [
                    'name' => 'Técnico',
                    'acronym' => 'T',
                    'user_id' => 1,
                    'created_at' => new DateTime('now')
                ],
                [
                    'name' => 'Superior',
                    'acronym' => 'S',
                    'user_id' => 1,
                    'created_at' => new DateTime('now')
                ],
                [
                    'name' => 'EJA',
                    'acronym' => 'E',
                    'user_id' => 1,
                    'created_at' => new DateTime('now')
                ],
            ]
        );
    }
}
