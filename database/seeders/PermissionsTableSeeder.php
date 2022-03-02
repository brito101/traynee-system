<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permissions')->insert([
            [
                'name' => 'Listar Permissões',
                'guard_name' => 'web'
            ],
            [
                'name' => 'Criar Permissões',
                'guard_name' => 'web'
            ],
            [
                'name' => 'Editar Permissões',
                'guard_name' => 'web'
            ],
            [
                'name' => 'Excluir Permissões',
                'guard_name' => 'web'
            ],
            [
                'name' => 'Listar Perfis',
                'guard_name' => 'web'
            ],
            [
                'name' => 'Criar Perfis',
                'guard_name' => 'web'
            ],
            [
                'name' => 'Editar Perfis',
                'guard_name' => 'web'
            ],
            [
                'name' => 'Excluir Perfis',
                'guard_name' => 'web'
            ],
            [
                'name' => 'Sincronizar Perfis',
                'guard_name' => 'web'
            ],

        ]);
    }
}
