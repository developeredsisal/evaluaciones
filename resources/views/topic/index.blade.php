@extends('layouts.app')
@section('content')
<div class="row">
    <div class="card bg-white">
        <div class="card-header border-b border-blueGray-200">
            <div class="card-header-container">
                <h1 class="card-title">
                    Materias
                </h1>

                @can('crear_tema')
                    <a class="btn btn-indigo" href="{{ route('topics.create') }}">
                        {{ trans('global.add') }} {{ trans('cruds.topic.title_singular') }}
                    </a>
                @endcan
            </div>
        </div>
        @livewire('topic.index')

    </div>
</div>
@endsection
