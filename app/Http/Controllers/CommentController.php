<?php

namespace App\Http\Controllers;

use Gate;
use App\Models\Comment;
use Illuminate\Http\Response;
use function view;
use function abort_if;

class CommentController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('acceso_comentarios'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('comment.index');
    }

    public function create()
    {
        abort_if(Gate::denies('crear_comentarios'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('comment.create');
    }

    public function edit(Comment $comment)
    {
        abort_if(Gate::denies('editar_comentarios'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('comment.edit', compact('comment'));
    }

    public function show(Comment $comment)
    {
        abort_if(Gate::denies('ver_comentarios'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $comment->load('question', 'quiz');

        return view('comment.show', compact('comment'));
    }
}
