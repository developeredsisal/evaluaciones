@extends('layouts.app')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    Crear usuarios
                </h6>
            </div>
        </div>

        <div class="card-body">
            @livewire('user.create')
        </div>
    </div>
</div>
@endsection
