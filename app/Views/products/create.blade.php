@extends('layout')

@section('content')
    <h1>Novo Produto</h1>

    <form method="POST" action="/products">
        {{-- Se você usar CSRF depois --}}
        {{-- @csrf --}}

        <div>
            <label for="name">Nome</label><br>
            <input
                type="text"
                id="name"
                name="name"
                required
            >
        </div>

        <div style="margin-top: 10px;">
            <label for="price">Preço</label><br>
            <input
                type="number"
                id="price"
                name="price"
                step="0.01"
                min="0.01"
                required
            >
        </div>

        <div style="margin-top: 10px;">
            <button type="submit">Salvar</button>
        </div>
    </form>
@endsection
