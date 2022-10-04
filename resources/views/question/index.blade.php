@extends('layouts.app')
@section('content')
<div class="row">
    <div class="card bg-white">
        <div class="card-header border-b border-blueGray-200">
            <div class="card-header-container">
                <h1 class="card-title">
                    Preguntas
                </h1>

                @can('crear_pregunta')
                    <a class="btn btn-indigo" href="{{ route('questions.create') }}">
                        {{ trans('global.add') }} {{ trans('cruds.question.title_singular') }}
                    </a>
                @endcan
            </div>
        </div>
        @livewire('question.index')

    </div>
</div>
@endsection
