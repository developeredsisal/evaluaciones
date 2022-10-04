@extends('layouts.auth')

@section('content')
<section class="relative w-full h-full py-40 min-h-screen">
    <div class="container mx-auto px-4 h-full">
        <div class="flex content-center items-center justify-center h-full">
            <div class="w-full lg:w-6/12 px-4">
                <div class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-white border-0">
                    <div class="rounded-t mb-0 px-6 py-6">
                        <div class="text-center mb-3">
                            <h6 class="text-blueGray-500 text-xl font-bold">
                                Formulario de registro
                            </h6>
                        </div>
                        <hr class="mt-6 border-b-1 border-blueGray-300" />
                    </div>
                    <div class="flex-auto px-4 lg:px-10 py-10 pt-0">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            @if(request()->filled('test_id'))
                            <input type="hidden" name="test_id" value="{{ request()->test_id }}">
                            @endif

                            <div class="relative w-full mb-3">
                                <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" for="name">
                                    Nombre
                                </label>
                                <input id="name" name="name" type="text" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full {{ $errors->has('name') ? ' ring ring-red-300' : '' }}" placeholder="Digite su nombre completo" required autofocus autocomplete="name" value="{{ old('name') }}" />
                                @error('name')
                                <div class="text-red-500">
                                    <small>{{ $message }}</small>
                                </div>
                                @enderror
                            </div>
                            <!--Nombre de usuario-->
                            <div class="relative w-full mb-3">
                                <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" for="name">
                                    Nombre de usuario
                                </label>
                                <input id="username" name="username" type="text" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full {{ $errors->has('username') ? ' ring ring-red-300' : '' }}" placeholder="Cree un nombre de usuario" required autocomplete="username" value="{{ old('username') }}" />
                                @error('username')
                                <div class="text-red-500">
                                    <small>{{ $message }}</small>
                                </div>
                                @enderror
                            </div>
                            <div class="form-group {{ $errors->has('user.locale') ? 'invalid' : '' }}">
                                <label class="form-label required" for="locale">Institución</label>
                                <input class="form-control" type="text" name="locale" id="locale" wire:model.defer="user.locale" placeholder="Nombre de institución" required>
                                <div class="validation-message">
                                    {{ $errors->first('user.locale') }}
                                </div>
                                <div class="help-block">
                                    {{ trans('cruds.user.fields.locale_helper') }}
                                </div>
                            </div>
                            <div class="relative w-full mb-3">
                                <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" for="password">
                                    Contraseña
                                </label>
                                <input id="password" name="password" type="password" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full {{ $errors->has('password') ? ' ring ring-red-300' : '' }}" placeholder="Digite su contraseña" required autocomplete="new-password" />
                                @error('password')
                                <div class="text-red-500">
                                    <small>{{ $message }}</small>
                                </div>
                                @enderror
                            </div>
                            <div class="relative w-full mb-3">
                                <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" for="password_confirmation">
                                    Confirme su contraseña
                                </label>
                                <input id="password_confirmation" name="password_confirmation" type="password" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full" placeholder="Digite su contraseña nuevamente" required autocomplete="new-password" />
                            </div>
                            <div class="text-center mt-6">
                                <button class="button text-white text-sm font-bold px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 w-full ease-linear transition-all duration-150">
                                    Registrarse
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
