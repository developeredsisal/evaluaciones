@extends('layouts.app')
@section('content')

    <div class="row">
        <div class="card bg-white w-full">
            <div class="card-header">
                <div class="card-row">
                    <h6 class="card-title">
                        {{ $quiz->title }}
                    </h6>
                </div>
            </div>

            <div class="card-body">
                @if ($quiz->public === false && !auth()->check())
                    <div class="text-white px-6 py-4 border-0 rounded relative mb-4 bg-indigo-500">
                        <span class="text-xl inline-block mr-5 align-middle">
                            <i class="fas fa-bell"></i>
                        </span>
                        <span class="inline-block align-middle mr-8">
                        Esta prueba está disponible solo para usuarios registrados. Por favor <a href="{{ route('login') }}" class="hover:underline">inicia sesión</a>
                        </span>
                    </div>
                @else
                    @livewire('front.quizzes.show', ['quiz' => $quiz])
                @endif
            </div>
        </div>
    </div>

@endsection
