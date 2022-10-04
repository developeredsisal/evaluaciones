@extends('layouts.app')
@section('content')
<div class="row">
    <div class="card bg-white">
        <div class="card-header border-b border-blueGray-200">
            <div class="card-header-container">
                <h1 class="card-title">
                    Comentarios
                </h1>

                @can('crear_comentarios')
                    <a class="btn btn-indigo" href="{{ route('comments.create') }}">
                        {{ trans('global.add') }} {{ trans('cruds.comment.title_singular') }}
                    </a>
                @endcan
            </div>
        </div>
        @livewire('comment.index')

    </div>
</div>
@endsection
