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
    <form action="{{ route('patients.update', $patient->id) }}" method="POST">
        @csrf
        @method('PUT') <!-- Esto indica que el formulario es de tipo PUT para la actualización -->
        <input type="text" name="name" value="{{ $patient->name }}" placeholder="Patient's Name" required><br>
        <input type="email" name="email" value="{{ $patient->email }}" placeholder="Email" required><br>
        <input type="password" name="password" placeholder="New Password (optional)"><br>
        <button type="submit">Update</button>
    </form>
</body>
</html>
   