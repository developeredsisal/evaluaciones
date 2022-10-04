<?php

namespace App\Http\Controllers;

use Gate;
use App\Models\Permission;
use Illuminate\Http\Response;
use function view;
use function abort_if;

class PermissionController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('acceso_permiso'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('permission.index');
    }

    public function create()
    {
        abort_if(Gate::denies('crear_permiso'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('permission.create');
    }

    public function edit(Permission $permission)
    {
        abort_if(Gate::denies('editar_permiso'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('permission.edit', compact('permission'));
    }

    public function show(Permission $permission)
    {
        abort_if(Gate::denies('ver_permiso'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('permission.show', compact('permission'));
    }
}
