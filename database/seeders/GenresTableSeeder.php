<?php

namespace Database\Seeders;

use App\Models\Genre;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GenresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('genres')->insert(
            [
                [
                    'name' => 'Feminino',
                    'acronym' => 'F',
                    'user_id' => 1
                ],
                [
                    'name' => 'Masculio',
                    'acronym' => 'M',
                    'user_id' => 1
                ],
                [
                    'name' => 'Outros',
                    'acronym' => 'O',
                    'user_id' => 1
                ]
            ]
        );
    }
}
