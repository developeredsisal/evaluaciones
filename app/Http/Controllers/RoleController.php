<?php

namespace App\Http\Controllers;

use Gate;
use App\Models\Role;
use Illuminate\Http\Response;
use function view;
use function abort_if;

class RoleController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('acceso_rol'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('role.index');
    }

    public function create()
    {
        abort_if(Gate::denies('crear_rol'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('role.create');
    }

    public function edit(Role $role)
    {
        abort_if(Gate::denies('editar_rol'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('role.edit', compact('role'));
    }

    public function show(Role $role)
    {
        abort_if(Gate::denies('ver_rol'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $role->load('permissions');

        return view('role.show', compact('role'));
    }
}
