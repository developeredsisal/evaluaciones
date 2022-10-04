<?php

namespace App\Http\Controllers;

use Gate;
use App\Models\Topic;
use Illuminate\Http\Response;
use function view;
use function abort_if;

class TopicController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('acceso_tema'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('topic.index');
    }

    public function create()
    {
        abort_if(Gate::denies('crear_tema'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('topic.create');
    }

    public function edit(Topic $topic)
    {
        abort_if(Gate::denies('editar_tema'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('topic.edit', compact('topic'));
    }

    public function show(Topic $topic)
    {
        abort_if(Gate::denies('ver_tema'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('topic.show', compact('topic'));
    }
}
