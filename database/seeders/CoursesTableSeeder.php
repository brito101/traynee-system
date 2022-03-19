<?php

namespace Database\Seeders;

use DateTime;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CoursesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('courses')->insert(
            [
                [
                    'name' => 'Informática',
                    'acronym' => 'INFO',
                    'user_id' => 1,
                    'created_at' => new DateTime('now')
                ],
                [
                    'name' => 'Idiomas',
                    'acronym' => 'I',
                    'user_id' => 1,
                    'created_at' => new DateTime('now')
                ],
                [
                    'name' => 'Atividade Complementar',
                    'acronym' => 'AC',
                    'user_id' => 1,
                    'created_at' => new DateTime('now')
                ],
            ]
        );
    }
}
