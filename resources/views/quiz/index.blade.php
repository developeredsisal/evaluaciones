@extends('layouts.app')
@section('content')
<div class="row">
    <div class="card bg-white">
        <div class="card-header border-b border-blueGray-200">
            <div class="card-header-container">
                <h1 class="card-title">
                    Evaluaciones
                </h1>

                @can('crear_evaluacion')
                    <a class="btn btn-indigo" href="{{ route('quizzes.create') }}">
                        {{ trans('global.add') }} {{ trans('cruds.quiz.title_singular') }}
                    </a>
                @endcan
            </div>
        </div>
        @livewire('quiz.index')

    </div>
</div>
@endsection
