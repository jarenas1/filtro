<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Doctors</h1>
    <a href="{{ route('doctors.create') }}">Create New Doctor</a>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Specialty</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($doctors as $doctor)
                <tr>
                    <td>{{ $doctor->name }}</td>
                    <td>{{ $doctor->specialty->name }}</td>
                    <td>{{ $doctor->email }}</td>
                    <td>
                        <a href="{{route('doctors.edit', $doctor) }}">Edit</a>
                        <a href="{{route('doctor_schedules.create', $doctor) }}">Asignar turno</a>
                        <form action="{{ route('doctors.destroy', $doctor) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
    
