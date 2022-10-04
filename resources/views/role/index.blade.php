@extends('layouts.app')
@section('content')
<div class="row">
    <div class="card bg-white">
        <div class="card-header border-b border-blueGray-200">
            <div class="card-header-container">
                <h6 class="card-title">
                    Roles de usuarios
                </h6>

                @can('crear_rol')
                    <a class="btn btn-indigo" href="{{ route('roles.create') }}">
                        {{ trans('global.add') }} {{ trans('cruds.role.title_singular') }}
                    </a>
                @endcan
            </div>
        </div>
        @livewire('role.index')

    </div>
</div>
@endsection
