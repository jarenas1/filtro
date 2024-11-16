<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Edit Patient</h1>
    <form action="{{ route('specialties.update', $specialty->id) }}" method="POST">
        @csrf
        @method('PUT') 
        <input type="text" name="name" value="{{ $specialty->name }}" placeholder="Nombre" required><br>
        <input type="text" name="description" value="{{ $specialty->description }}" placeholder="Especialidad" required><br>
        <button type="submit">Update</button>
    </form>
</body>
</html>