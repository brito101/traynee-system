<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesHasPermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();
        DB::table('role_has_permissions')->insert([
            /** ACL */
            [
                'permission_id' => 1,
                'role_id' => 1
            ],
            [
                'permission_id' => 2,
                'role_id' => 1
            ],
            [
                'permission_id' => 3,
                'role_id' => 1
            ],
            [
                'permission_id' => 4,
                'role_id' => 1
            ],
            [
                'permission_id' => 5,
                'role_id' => 1
            ],
            [
                'permission_id' => 6,
                'role_id' => 1
            ],
            [
                'permission_id' => 7,
                'role_id' => 1
            ],
            [
                'permission_id' => 8,
                'role_id' => 1
            ],
            [
                'permission_id' => 9,
                'role_id' => 1
            ],
            [
                'permission_id' => 10,
                'role_id' => 1
            ],
            [
                'permission_id' => 11,
                'role_id' => 1
            ],
            [
                'permission_id' => 11,
                'role_id' => 2
            ],
            [
                'permission_id' => 11,
                'role_id' => 3
            ],
            /** Settings */
            [
                'permission_id' => 12,
                'role_id' => 1
            ],
            [
                'permission_id' => 12,
                'role_id' => 2
            ],
            /** Genres */
            [
                'permission_id' => 13,
                'role_id' => 1
            ],
            [
                'permission_id' => 13,
                'role_id' => 2
            ],
            [
                'permission_id' => 14,
                'role_id' => 1
            ],
            [
                'permission_id' => 14,
                'role_id' => 2
            ],
            [
                'permission_id' => 15,
                'role_id' => 1
            ],
            [
                'permission_id' => 15,
                'role_id' => 2
            ],
            [
                'permission_id' => 16,
                'role_id' => 1
            ],
            [
                'permission_id' => 16,
                'role_id' => 2
            ],
            [
                'permission_id' => 17,
                'role_id' => 1
            ],
            [
                'permission_id' => 17,
                'role_id' => 2
            ],
            /** Scholarities */
            [
                'permission_id' => 18,
                'role_id' => 1
            ],
            [
                'permission_id' => 18,
                'role_id' => 2
            ],
            [
                'permission_id' => 19,
                'role_id' => 1
            ],
            [
                'permission_id' => 19,
                'role_id' => 2
            ],
            [
                'permission_id' => 20,
                'role_id' => 1
            ],
            [
                'permission_id' => 20,
                'role_id' => 2
            ],
            [
                'permission_id' => 21,
                'role_id' => 1
            ],
            [
                'permission_id' => 21,
                'role_id' => 2
            ],
            [
                'permission_id' => 22,
                'role_id' => 1
            ],
            [
                'permission_id' => 22,
                'role_id' => 2
            ],
            /** Courses */
            [
                'permission_id' => 23,
                'role_id' => 1
            ],
            [
                'permission_id' => 23,
                'role_id' => 2
            ],
            [
                'permission_id' => 24,
                'role_id' => 1
            ],
            [
                'permission_id' => 24,
                'role_id' => 2
            ],
            [
                'permission_id' => 25,
                'role_id' => 1
            ],
            [
                'permission_id' => 25,
                'role_id' => 2
            ],
            [
                'permission_id' => 26,
                'role_id' => 1
            ],
            [
                'permission_id' => 26,
                'role_id' => 2
            ],
            [
                'permission_id' => 27,
                'role_id' => 1
            ],
            [
                'permission_id' => 27,
                'role_id' => 2
            ],
            /** Affiliations */
            [
                'permission_id' => 28,
                'role_id' => 1
            ],
            [
                'permission_id' => 28,
                'role_id' => 2
            ],
            [
                'permission_id' => 29,
                'role_id' => 1
            ],
            [
                'permission_id' => 29,
                'role_id' => 2
            ],
            [
                'permission_id' => 30,
                'role_id' => 1
            ],
            [
                'permission_id' => 30,
                'role_id' => 2
            ],
            [
                'permission_id' => 31,
                'role_id' => 1
            ],
            [
                'permission_id' => 31,
                'role_id' => 2
            ],
            [
                'permission_id' => 32,
                'role_id' => 1
            ],
            [
                'permission_id' => 32,
                'role_id' => 2
            ],
            [
                'permission_id' => 33,
                'role_id' => 1
            ],
            [
                'permission_id' => 33,
                'role_id' => 2
            ],
            /** Companies */
            [
                'permission_id' => 34,
                'role_id' => 1
            ],
            [
                'permission_id' => 34,
                'role_id' => 2
            ],
            [
                'permission_id' => 34,
                'role_id' => 3
            ],
            [
                'permission_id' => 35,
                'role_id' => 1
            ],
            [
                'permission_id' => 35,
                'role_id' => 2
            ],
            [
                'permission_id' => 35,
                'role_id' => 3
            ],
            [
                'permission_id' => 36,
                'role_id' => 1
            ],
            [
                'permission_id' => 36,
                'role_id' => 2
            ],
            [
                'permission_id' => 36,
                'role_id' => 3
            ],
            [
                'permission_id' => 37,
                'role_id' => 1
            ],
            [
                'permission_id' => 37,
                'role_id' => 2
            ],
            [
                'permission_id' => 37,
                'role_id' => 3
            ],
            [
                'permission_id' => 38,
                'role_id' => 1
            ],
            [
                'permission_id' => 38,
                'role_id' => 2
            ],
            [
                'permission_id' => 38,
                'role_id' => 3
            ],
            [
                'permission_id' => 39,
                'role_id' => 1
            ],
            [
                'permission_id' => 39,
                'role_id' => 2
            ],
            [
                'permission_id' => 39,
                'role_id' => 3
            ],
            /** Users */
            [
                'permission_id' => 40,
                'role_id' => 1
            ],
            [
                'permission_id' => 40,
                'role_id' => 2
            ],
            [
                'permission_id' => 40,
                'role_id' => 3
            ],
            [
                'permission_id' => 41,
                'role_id' => 1
            ],
            [
                'permission_id' => 41,
                'role_id' => 2
            ],
            [
                'permission_id' => 41,
                'role_id' => 3
            ],
            [
                'permission_id' => 42,
                'role_id' => 1
            ],
            [
                'permission_id' => 42,
                'role_id' => 2
            ],
            [
                'permission_id' => 42,
                'role_id' => 3
            ],
            [
                'permission_id' => 43,
                'role_id' => 1
            ],
            [
                'permission_id' => 43,
                'role_id' => 2
            ],
            [
                'permission_id' => 43,
                'role_id' => 3
            ],
            [
                'permission_id' => 44,
                'role_id' => 1
            ],
            [
                'permission_id' => 44,
                'role_id' => 2
            ],
            [
                'permission_id' => 44,
                'role_id' => 3
            ],
            /** Affiliate / Businessmen / Trainee */
            [
                'permission_id' => 45,
                'role_id' => 3
            ],
            [
                'permission_id' => 45,
                'role_id' => 4
            ],
            [
                'permission_id' => 45,
                'role_id' => 5
            ],
            /** Affiliate */
            [
                'permission_id' => 46,
                'role_id' => 3
            ],
            [
                'permission_id' => 47,
                'role_id' => 3
            ],
            /** Businessmen */
            [
                'permission_id' => 48,
                'role_id' => 4
            ],
            [
                'permission_id' => 49,
                'role_id' => 4
            ],
            [
                'permission_id' => 50,
                'role_id' => 4
            ],
            [
                'permission_id' => 51,
                'role_id' => 4
            ],
            [
                'permission_id' => 52,
                'role_id' => 4
            ],
            [
                'permission_id' => 53,
                'role_id' => 4
            ],
            [
                'permission_id' => 54,
                'role_id' => 4
            ],
            [
                'permission_id' => 55,
                'role_id' => 4
            ],
            [
                'permission_id' => 56,
                'role_id' => 4
            ],
            [
                'permission_id' => 57,
                'role_id' => 4
            ],
            [
                'permission_id' => 58,
                'role_id' => 4
            ],
            [
                'permission_id' => 59,
                'role_id' => 4
            ],
            /** Trainees */
            [
                'permission_id' => 60,
                'role_id' => 5
            ],
            [
                'permission_id' => 61,
                'role_id' => 5
            ],
            [
                'permission_id' => 62,
                'role_id' => 5
            ],
            [
                'permission_id' => 63,
                'role_id' => 5
            ],
            [
                'permission_id' => 64,
                'role_id' => 5
            ],
            [
                'permission_id' => 65,
                'role_id' => 5
            ],
            /** Visualizar Estagiários */
            [
                'permission_id' => 66,
                'role_id' => 1
            ],
            [
                'permission_id' => 66,
                'role_id' => 2
            ],
            [
                'permission_id' => 66,
                'role_id' => 3
            ],
            /** Trainee */
            [
                'permission_id' => 67,
                'role_id' => 5
            ],
            /** Visualizar Vagas */
            [
                'permission_id' => 68,
                'role_id' => 1
            ],
            [
                'permission_id' => 68,
                'role_id' => 2
            ],
            [
                'permission_id' => 68,
                'role_id' => 3
            ],
            /** Visualizar Compatibilidade */
            [
                'permission_id' => 69,
                'role_id' => 1
            ],
            [
                'permission_id' => 69,
                'role_id' => 2
            ],
            [
                'permission_id' => 69,
                'role_id' => 3
            ],
            /** Visualizar Relatório Compatibilidade */
            [
                'permission_id' => 70,
                'role_id' => 1
            ],
            [
                'permission_id' => 70,
                'role_id' => 2
            ],
            [
                'permission_id' => 70,
                'role_id' => 3
            ],
            /** Universidades */

            [
                'permission_id' => 71,
                'role_id' => 6
            ],

            [
                'permission_id' => 72,
                'role_id' => 1
            ],
            [
                'permission_id' => 72,
                'role_id' => 2
            ],
            [
                'permission_id' => 72,
                'role_id' => 3
            ],

            /** Terms */
            [
                'permission_id' => 73,
                'role_id' => 1
            ],
            [
                'permission_id' => 73,
                'role_id' => 2
            ],
            [
                'permission_id' => 74,
                'role_id' => 1
            ],
            [
                'permission_id' => 74,
                'role_id' => 2
            ],
            [
                'permission_id' => 75,
                'role_id' => 1
            ],
            [
                'permission_id' => 75,
                'role_id' => 2
            ],
            [
                'permission_id' => 76,
                'role_id' => 1
            ],
            [
                'permission_id' => 76,
                'role_id' => 2
            ],
            [
                'permission_id' => 77,
                'role_id' => 1
            ],
            [
                'permission_id' => 77,
                'role_id' => 2
            ],
            [
                'permission_id' => 77,
                'role_id' => 3,
            ],
            /** Reports */
            [
                'permission_id' => 78,
                'role_id' => 4,
            ],
            [
                'permission_id' => 78,
                'role_id' => 6,
            ],
            [
                'permission_id' => 79,
                'role_id' => 4,
            ],
            [
                'permission_id' => 79,
                'role_id' => 5,
            ],
            [
                'permission_id' => 79,
                'role_id' => 6,
            ],
            [
                'permission_id' => 80,
                'role_id' => 1,
            ],
            [
                'permission_id' => 80,
                'role_id' => 2,
            ],
            [
                'permission_id' => 80,
                'role_id' => 5,
            ],
            /** Salary Search */
            [
                'permission_id' => 81,
                'role_id' => 4,
            ],
            [
                'permission_id' => 82,
                'role_id' => 4,
            ],
            [
                'permission_id' => 83,
                'role_id' => 4,
            ],
            [
                'permission_id' => 84,
                'role_id' => 4,
            ],
            [
                'permission_id' => 85,
                'role_id' => 4,
            ],
            /** Pagamento */
            [
                'permission_id' => 86,
                'role_id' => 1,
            ],
            [
                'permission_id' => 86,
                'role_id' => 2,
            ],
            [
                'permission_id' => 87,
                'role_id' => 1,
            ],
            [
                'permission_id' => 87,
                'role_id' => 2,
            ],
            [
                'permission_id' => 88,
                'role_id' => 1,
            ],
            [
                'permission_id' => 88,
                'role_id' => 2,
            ],
            [
                'permission_id' => 89,
                'role_id' => 1,
            ],
            [
                'permission_id' => 89,
                'role_id' => 2,
            ],
            [
                'permission_id' => 90,
                'role_id' => 1,
            ],
            [
                'permission_id' => 90,
                'role_id' => 2,
            ],
            [
                'permission_id' => 91,
                'role_id' => 1,
            ],
            [
                'permission_id' => 91,
                'role_id' => 2,
            ],
            /** Produtos */
            [
                'permission_id' => 92,
                'role_id' => 4,
            ],
        ]);
    }
}
