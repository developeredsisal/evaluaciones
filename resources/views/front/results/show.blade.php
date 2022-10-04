@extends('layouts.app')
@section('content')

    <div class="row">
        <div class="w-full card bg-blueGray-100">
            <div class="card-header">
                <div class="card-row">
                    <h6 class="card-title">
                        Resultados
                    </h6>
                </div>
            </div>

            <div class="card-body">
                <table class="table mt-4 w-full table-view">
                    <tbody class="bg-white">
                        <tr class="w-28">
                            <th>Fecha</th>
                            <td>{{ $test->created_at ?? '' }}</td>
                        </tr>
                        <tr class="w-28">
                            <th>Resultados</th>
                            <td>
                                {{ $test->result }} / {{ $total_questions }}
                                @if($test->time_spent)
                                    (Tiempo: {{ intval($test->time_spent / 60) }}:{{ gmdate('s', $test->time_spent) }}
                                    minutos)
                                @endif
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        @if($users)
            <div class="w-full card bg-blueGray-100">
                <div class="card-header">
                    <div class="card-row">
                        <h6 class="card-title">
                            Tabla de notas
                        </h6>
                    </div>
                </div>

                <div class="card-body">
                    <table class="table mt-4 w-full table-view">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Nombre de usuario</th>
                                <th>Respuestas correctas</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white">
                            @forelse($users as $user)
                                <tr class="@if(auth()->user() && auth()->user()->name == $user->name) bg-blueGray-300 @endif">
                                    <td class="w-9">{{ $loop->iteration }}</td>
                                    <td class="w-1/2">{{ $user->name }}</td>
                                    <td>{{ $user->correct }} / {{ $total_questions }}
                                        (Tiempo: {{ intval($user->time_spent / 60) }}:{{ gmdate('s', $user->time_spent) }} minutos)</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3">Sin resultados</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        @endif

        <div class="w-full card bg-blueGray-100">
                <div class="card-header">
                    <div class="card-row">
                        <h6 class="card-title">
                        Preguntas y respuestas
                        </h6>
                        @guest
                        ¿Quiere tomar más evaluaciones y estar en la tabla de clasificación? <a href="{{ route('register', ['test_id' => $test->id]) }}" class="btn btn-success btn-sm">¡Registrate</a> aqui!
                        @endguest
                    </div>
                </div>

                <div class="card-body">
                    @foreach($results as $result)
                        <table class="table table-view w-full my-4 bg-white">
                            <tbody class="bg-white">
                                <tr class="bg-blueGray-300">
                                    <td class="w-1/2">Pregunta #{{ $loop->iteration }}</td>
                                    <td>{!! nl2br($result->question->question_text) !!}</td>
                                </tr>
                                <tr>
                                    <td>Opciones</td>
                                    <td>
                                        @foreach($result->question->questionOptions as $option)
                                            <li class="@if ($result->option_id == $option->id) underline @endif @if ($option->correct == 1) font-bold @endif">{{ $option->option }}
                                                @if ($option->correct == 1) <em>(respuesta correcta)</em> @endif
                                                @if ($result->option_id == $option->id) <em>(su
                                                     respuesta)</em> @endif
                                            </li>
                                        @endforeach
                                        @if(is_null($result->option_id))
                                            <span class="font-bold"><em>Pregunta sin respuesta.</em></span>
                                        @endif
                                    </td>
                                </tr>
                                @if($result->question->answer_explanation || $result->question->more_info_link)
                                    <tr>
                                        <td>Explicación</td>
                                        <td>
                                            {!! $result->question->answer_explanation  !!}
                                            @if ($result->question->more_info_link)
                                                <div class="mt-4">
                                                    Leer más:
                                                    <a href="{{ $result->question->more_info_link }}" class="hover:underline" target="_blank">
                                                        {{ $result->question->more_info_link }}
                                                    </a>
                                                </div>
                                            @endif
                                        </td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>

                        @livewire('front.results.comment', ['questionId' => $result->question->id, 'quizId' => $test->quiz->id])

                        @if(!$loop->last)
                            <hr class="my-4 md:min-w-full">
                        @endif
                    @endforeach
                </div>
        </div>
    </div>

@endsection
