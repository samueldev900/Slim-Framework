@extends('layout')

@section('content')
    <h1>Produtos</h1>

    @if (empty($products))
        <p>Nenhum produto cadastrado ainda.</p>
    @else
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Preço</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $p)
                    <tr>
                        <td>{{ $p['id'] ?? $p->id }}</td>
                        <td>{{ $p['name'] ?? $p->name }}</td>
                        <td>R$ {{ $p['price'] ?? $p->price }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection
