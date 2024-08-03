<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Formulário para editar as informações de um cliente.">
    <title>Editar Cliente</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>
    <div class="container mt-5">
        <h1>Editar Cliente</h1>
        
        <!-- Exibir mensagens de sucesso ou erro -->
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @elseif($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('clients.update', $client->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">Nome:</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $client->name) }}" required>
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $client->email) }}" required>
            </div>

            <div class="form-group">
                <label for="phone">Telefone:</label>
                <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone', $client->phone) }}" required>
            </div>

            <div class="form-group">
                <label for="photo">Foto: (formatos aceitáveis jpeg, png, jpg, svg)</label>
                <input type="file" class="form-control" id="photo" name="photo">
                @if($client->photo)
                    <small class="form-text text-muted">Foto atual: <a href="{{ asset('storage/' . $client->photo) }}" target="_blank">Visualizar</a></small>
                @endif
            </div>

            <button type="submit" class="btn btn-success">Salvar</button>
        </form>
    </div>
</body>
</html>
