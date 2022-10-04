@extends('layouts.app')
@section('content')
<div class="row">
    <div class="card bg-white">
        <div class="card-header border-b border-blueGray-200">
            <div class="card-header-container">
                <h6 class="card-title">
                    Permisos de los usuarios
                </h6>

                @can('crear_permiso')
                    <a class="btn btn-indigo" href="{{ route('permissions.create') }}">
                        {{ trans('global.add') }} {{ trans('cruds.permission.title_singular') }}
                    </a>
                @endcan
            </div>
        </div>
        @livewire('permission.index')

    </div>
</div>
@endsection
