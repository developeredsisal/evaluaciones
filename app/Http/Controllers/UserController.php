<?php

namespace App\Http\Controllers;

use Gate;
use App\Models\User;
use Illuminate\Http\Response;
use function view;
use function abort_if;

class UserController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('acceso_usuario'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('user.index');
    }

    public function create()
    {
        abort_if(Gate::denies('crear_usuario'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('user.create');
    }

    public function edit(User $user)
    {
        abort_if(Gate::denies('editar_usuario'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('user.edit', compact('user'));
    }

    public function show(User $user)
    {
        abort_if(Gate::denies('ver_usuario'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $user->load('roles');

        return view('user.show', compact('user'));
    }
}
