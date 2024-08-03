<!DOCTYPE html>
<html>
<head>
    <title>Editar Cliente</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>
    <div class="container mt-5">
        <h1>Editar Cliente</h1>
        <form action="{{ route('clients.update', $client->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Nome:</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $client->name }}" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ $client->email }}" required>
            </div>
            <div class="form-group">
                <label for="phone">Telefone:</label>
                <input type="text" class="form-control" id="phone" name="phone" value="{{ $client->phone }}" required>
            </div>
            <div class="form-group">
                <label for="photo">Foto: (formatos aceitáveis jpeg, png, jpg, svg)</label>
                <input type="file" class="form-control" id="photo" name="photo">
            </div>
            <button type="submit" class="btn btn-success">Salvar</button>
        </form>
    </div>
</body>
</html>
