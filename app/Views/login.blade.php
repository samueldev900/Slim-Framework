@extends('layout')

@section('content')
    <h1>Login</h1>

    @if (!empty($error))
        <div class="alert-error">
            {{ $error }}
        </div>
    @endif

    <form action="/login" method="POST" class="card">
        {{-- Se você tiver CSRF no seu Slim MVC, descomente e passe o token --}}
        {{-- <input type="hidden" name="_token" value="{{ $csrf ?? '' }}"> --}}

        <div class="form-group">
            <label for="email">E-mail</label>
            <input
                type="email"
                id="email"
                name="email"
                value="{{ $old['email'] ?? '' }}"
                placeholder="seuemail@dominio.com"
                required
                autocomplete="email"
            >
        </div>

        <div class="form-group">
            <label for="password">Senha</label>
            <input
                type="password"
                id="password"
                name="password"
                placeholder="Digite sua senha"
                required
                autocomplete="current-password"
            >
        </div>

        <div class="form-row">
            <label class="checkbox">
                <input type="checkbox" name="remember" value="1">
                <span>Lembrar de mim</span>
            </label>

            <a href="/esqueci-senha" class="link">Esqueci minha senha</a>
        </div>

        <button type="submit" class="btn">Entrar</button>

        <p class="muted">
            Não tem conta?
            <a href="/registrar" class="link">Criar conta</a>
        </p>
    </form>

    <style>
        
    </style>
@endsection
