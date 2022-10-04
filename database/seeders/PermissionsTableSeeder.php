<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'editar_perfiles',
            ],
            [
                'id'    => 2,
                'title' => 'acceso_editar_usuario',
            ],
            [
                'id'    => 3,
                'title' => 'crear_permiso',
            ],
            [
                'id'    => 4,
                'title' => 'editar_permiso',
            ],
            [
                'id'    => 5,
                'title' => 'ver_permiso',
            ],
            [
                'id'    => 6,
                'title' => 'borrar_permiso',
            ],
            [
                'id'    => 7,
                'title' => 'acceso_permiso',
            ],
            [
                'id'    => 8,
                'title' => 'crear_rol',
            ],
            [
                'id'    => 9,
                'title' => 'editar_rol',
            ],
            [
                'id'    => 10,
                'title' => 'ver_rol',
            ],
            [
                'id'    => 11,
                'title' => 'borrar_rol',
            ],
            [
                'id'    => 12,
                'title' => 'acceso_rol',
            ],
            [
                'id'    => 13,
                'title' => 'crear_usuario',
            ],
            [
                'id'    => 14,
                'title' => 'editar_usuario',
            ],
            [
                'id'    => 15,
                'title' => 'ver_usuario',
            ],
            [
                'id'    => 16,
                'title' => 'borrar_usuario',
            ],
            [
                'id'    => 17,
                'title' => 'acceso_usuario',
            ],
            [
                'id'    => 18,
                'title' => 'crear_tema',
            ],
            [
                'id'    => 19,
                'title' => 'editar_tema',
            ],
            [
                'id'    => 20,
                'title' => 'ver_tema',
            ],
            [
                'id'    => 21,
                'title' => 'borrar_tema',
            ],
            [
                'id'    => 22,
                'title' => 'acceso_tema',
            ],
            [
                'id'    => 23,
                'title' => 'crear_pregunta',
            ],
            [
                'id'    => 24,
                'title' => 'editar_pregunta',
            ],
            [
                'id'    => 25,
                'title' => 'ver_pregunta',
            ],
            [
                'id'    => 26,
                'title' => 'borrar_pregunta',
            ],
            [
                'id'    => 27,
                'title' => 'acceso_pregunta',
            ],
            [
                'id'    => 33,
                'title' => 'crear_evaluacion',
            ],
            [
                'id'    => 34,
                'title' => 'editar_evaluacion',
            ],
            [
                'id'    => 35,
                'title' => 'mostar_evaluacion',
            ],
            [
                'id'    => 36,
                'title' => 'borrar_evaluacion',
            ],
            [
                'id'    => 37,
                'title' => 'acceso_evaluacion',
            ],
            [
                'id'    => 38,
                'title' => 'crear_examen',
            ],
            [
                'id'    => 39,
                'title' => 'editar_examen',
            ],
            [
                'id'    => 40,
                'title' => 'mostrar_examen',
            ],
            [
                'id'    => 41,
                'title' => 'eliminar_examen',
            ],
            [
                'id'    => 42,
                'title' => 'acceso_examen',
            ],
            [
                'id'    => 43,
                'title' => 'crear_respuestas_examen',
            ],
            [
                'id'    => 44,
                'title' => 'editar_respuestas_examen',
            ],
            [
                'id'    => 45,
                'title' => 'ver_respuestas_examen',
            ],
            [
                'id'    => 46,
                'title' => 'eliminar_respuestas_examen',
            ],
            [
                'id'    => 47,
                'title' => 'acceso_respuestas_examen',
            ],
            [
                'id'    => 48,
                'title' => 'crear_comentarios',
            ],
            [
                'id'    => 49,
                'title' => 'editar_comentarios',
            ],
            [
                'id'    => 50,
                'title' => 'ver_comentarios',
            ],
            [
                'id'    => 51,
                'title' => 'eliminar_comentarios',
            ],
            [
                'id'    => 52,
                'title' => 'acceso_comentarios',
            ],
        ];

        Permission::insert($permissions);
    }
}
