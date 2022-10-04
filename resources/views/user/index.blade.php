@extends('layouts.app')
@section('content')
<div class="row">
    <div class="card bg-white">
        <div class="card-header border-b border-blueGray-200">
            <div class="card-header-container">
                <h1 class="card-title">
                    Usuarios
                </h1>

                @can('crear_usuario')
                <a class="btn btn-indigo" href="{{ route('users.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.user.title_singular') }}
                </a>
                @endcan
            </div>
        </div>
        @livewire('user.index')

    </div>
</div>
@endsection
