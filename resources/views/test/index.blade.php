@extends('layouts.app')
@section('content')
<div class="row">
    <div class="card bg-white">
        <div class="card-header border-b border-blueGray-200">
            <div class="card-header-container">
                <h1 class="card-title">
                    Notas
                </h1>

                @can('crear_examen')
                    <a class="btn btn-indigo" href="{{ route('tests.create') }}">
                        {{ trans('global.add') }} {{ trans('cruds.test.title_singular') }}
                    </a>
                @endcan
            </div>
        </div>
        @livewire('test.index')

    </div>
</div>
@endsection
