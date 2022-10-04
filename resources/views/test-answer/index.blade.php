@extends('layouts.app')
@section('content')
<div class="row">
    <div class="card bg-white">
        <div class="card-header border-b border-blueGray-200">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('cruds.testAnswer.title_singular') }}
                    {{ trans('global.list') }}
                </h6>

                @can('crear_respuestas_examen')
                    <a class="btn btn-indigo" href="{{ route('test-answers.create') }}">
                        {{ trans('global.add') }} {{ trans('cruds.testAnswer.title_singular') }}
                    </a>
                @endcan
            </div>
        </div>
        @livewire('test-answer.index')

    </div>
</div>
@endsection
