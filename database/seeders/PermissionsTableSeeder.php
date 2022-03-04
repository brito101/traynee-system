<?php

namespace Database\Seeders;

use DateTime;
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
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();
        DB::table('permissions')->insert([
            /** ACL */
            [
                'name' => 'Acessar ACL',
                'guard_name' => 'web',
                'created_at' => new DateTime('now')
            ],
            [
                'name' => 'Listar Permissões',
                'guard_name' => 'web',
                'created_at' => new DateTime('now')
            ],
            [
                'name' => 'Criar Permissões',
                'guard_name' => 'web',
                'created_at' => new DateTime('now')
            ],
            [
                'name' => 'Editar Permissões',
                'guard_name' => 'web',
                'created_at' => new DateTime('now')
            ],
            [
                'name' => 'Excluir Permissões',
                'guard_name' => 'web',
                'created_at' => new DateTime('now')
            ],
            [
                'name' => 'Listar Perfis',
                'guard_name' => 'web',
                'created_at' => new DateTime('now')
            ],
            [
                'name' => 'Criar Perfis',
                'guard_name' => 'web',
                'created_at' => new DateTime('now')
            ],
            [
                'name' => 'Editar Perfis',
                'guard_name' => 'web',
                'created_at' => new DateTime('now')
            ],
            [
                'name' => 'Excluir Perfis',
                'guard_name' => 'web',
                'created_at' => new DateTime('now')
            ],
            [
                'name' => 'Sincronizar Perfis',
                'guard_name' => 'web',
                'created_at' => new DateTime('now')
            ],
            /** Settings Access */
            [
                'name' => 'Acessar Configurações',
                'guard_name' => 'web',
                'created_at' => new DateTime('now')
            ],
            /** Genres */
            [
                'name' => 'Acessar Gêneros',
                'guard_name' => 'web',
                'created_at' => new DateTime('now')
            ],
            [
                'name' => 'Listar Gêneros',
                'guard_name' => 'web',
                'created_at' => new DateTime('now')
            ],
            [
                'name' => 'Criar Gêneros',
                'guard_name' => 'web',
                'created_at' => new DateTime('now')
            ],
            [
                'name' => 'Editar Gêneros',
                'guard_name' => 'web',
                'created_at' => new DateTime('now')
            ],
            [
                'name' => 'Excluir Gêneros',
                'guard_name' => 'web',
                'created_at' => new DateTime('now')
            ],
            /** Companies */
            [
                'name' => 'Acessar Empresas',
                'guard_name' => 'web',
                'created_at' => new DateTime('now')
            ],
            [
                'name' => 'Listar Empresas',
                'guard_name' => 'web',
                'created_at' => new DateTime('now')
            ],
            [
                'name' => 'Criar Empresas',
                'guard_name' => 'web',
                'created_at' => new DateTime('now')
            ],
            [
                'name' => 'Editar Empresas',
                'guard_name' => 'web',
                'created_at' => new DateTime('now')
            ],
            [
                'name' => 'Excluir Empresas',
                'guard_name' => 'web',
                'created_at' => new DateTime('now')
            ],
            /** Users */
            [
                'name' => 'Acessar Usuários',
                'guard_name' => 'web',
                'created_at' => new DateTime('now')
            ],
            [
                'name' => 'Listar Usuários',
                'guard_name' => 'web',
                'created_at' => new DateTime('now')
            ],
            [
                'name' => 'Criar Usuários',
                'guard_name' => 'web',
                'created_at' => new DateTime('now')
            ],
            [
                'name' => 'Editar Usuários',
                'guard_name' => 'web',
                'created_at' => new DateTime('now')
            ],
            [
                'name' => 'Excluir Usuários',
                'guard_name' => 'web',
                'created_at' => new DateTime('now')
            ],
        ]);
    }
}
