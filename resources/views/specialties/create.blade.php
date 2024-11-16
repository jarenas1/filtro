<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Create New Patient</h1>
    <form action="{{ route('specialties.store') }}" method="POST">
        @csrf
        <input type="text" name="name" placeholder="name" required><br>
        <input type="text" name="description" placeholder="description" required><br>
        <button type="submit">Save</button>
    </form>
</body>
</html>