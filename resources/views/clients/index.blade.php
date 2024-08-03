<!DOCTYPE html>
<html>
<head>
    <title>Clientes</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Lista de Clientes</h1>

         <!-- Success message -->
         @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <a href="{{ route('clients.create') }}" class="btn btn-success mb-3">Adicionar Cliente</a>
        <table class="table table-bordered">
            <tr>
                <th>Nome</th>
                <th>Email</th>
                <th>Telefone</th>
                <th>Foto</th>
                <th>Ações</th>
            </tr>
            @foreach ($clients as $client)
            <tr>
                <td>{{ $client->name }}</td>
                <td>{{ $client->email }}</td>
                <td>{{ $client->phone }}</td>
                <td><img src="{{ asset('storage/' . $client->photo) }}" width="50"></td>
                <td>
                    <a href="{{ route('clients.edit', $client->id) }}" class="btn btn-primary">Editar</a>
                    <form action="{{ route('clients.destroy', $client->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Excluir</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
</body>
</html>
