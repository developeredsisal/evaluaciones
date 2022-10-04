<?php

namespace App\Http\Controllers;

use Gate;
use App\Models\Test;
use Illuminate\Http\Response;
use function view;
use function abort_if;

class TestController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('acceso_examen'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('test.index');
    }

    public function create()
    {
        abort_if(Gate::denies('crear_examen'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('test.create');
    }

    public function edit(Test $test)
    {
        abort_if(Gate::denies('editar_examen'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('test.edit', compact('test'));
    }

    public function show(Test $test)
    {
        abort_if(Gate::denies('mostrar_examen'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $test->load('user', 'quiz');

        return view('test.show', compact('test'));
    }
}
