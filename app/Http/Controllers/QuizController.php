<?php

namespace App\Http\Controllers;

use Gate;
use App\Models\Quiz;
use Illuminate\Http\Response;
use function view;
use function abort_if;

class QuizController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('acceso_evaluacion'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('quiz.index');
    }

    public function create()
    {
        abort_if(Gate::denies('crear_evaluacion'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('quiz.create');
    }

    public function edit(Quiz $quiz)
    {
        abort_if(Gate::denies('editar_evaluacion'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('quiz.edit', compact('quiz'));
    }

    public function show(Quiz $quiz)
    {
        abort_if(Gate::denies('mostar_evaluacion'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('quiz.show', compact('quiz'));
    }
}
