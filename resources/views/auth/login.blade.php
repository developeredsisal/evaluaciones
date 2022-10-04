@extends('layouts.auth')

@section('content')
<section class="login-form min-h-screen">
    <div class="container px-4 h-full">
        <div class="flex content-center items-center justify-center h-full">
            <div class="w-full lg:w-4/12 px-4">
                <div class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-white border-0">
                    <div class="rounded-t mb-0 px-6 py-6">
                        <div class="text-center mb-3">
                            <img src="/assets/img/logo.png" alt="" width="100vh" height="88vh">
                        </div>
                        <hr class="mt-6 border-b-1 border-blueGray-300" />
                    </div>
                    <div class="flex-auto px-4 lg:px-10 py-10 pt-0">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="relative w-full mb-3">
                                <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" for="username">
                                    Nombre de usuario
                                </label>
                                <input id="username" name="username" type="text" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full {{ $errors->has('username') ? ' ring ring-red-300' : '' }}" placeholder="Digite su nombre de usuario" required autocomplete="username" autofocus value="{{ old('username') }}" />
                                @error('username')
                                <div class="text-red-500">
                                    <small>{{ $message }}</small>
                                </div>
                                @enderror
                            </div>
                            <div class="relative w-full mb-3">
                                <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" for="password">
                                    Contraseña
                                </label>
                                <input id="clave" name="password" type="text" class="clave border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full {{ $errors->has('password') ? ' ring ring-red-300' : '' }}" placeholder="Digite su contraseña" required />
                                <span id="ver" class="icon-eye text-blueGray-700"><i id="icono" class="fas fa-eye"></i></span>
                                @error('password')
                                <span class="text-red-500">
                                    <small>{{ $message }}</small>
                                </span>
                                @enderror
                            </div>
                            <div>
                                <label class="inline-flex items-center cursor-pointer"><input id="remember" name="remember" type="checkbox" class="form-checkbox border-2 rounded text-blueGray-700 ml-1 w-5 h-5 ease-linear transition-all duration-150" {{ old('remember') ? 'checked' : '' }} />
                                    <span class="ml-2 text-sm font-semibold text-blueGray-600">
                                        Recordar mis datos
                                    </span>
                                </label>
                            </div>
                            <div class="text-center mt-6">
                                <button class="button text-white text-sm font-bold px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 w-full ease-linear transition-all duration-150">
                                    Ingresar
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
