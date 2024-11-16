<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Citas</h1>
    <a href="{{ route('appoiments.create') }}">Crear cita</a>
    <table>
        <thead>
            <tr>
                <th>id usuario</th>
                <th>id Especialidad</th>
                <th>Id doctor</th>
                <th>status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($appointments as $appointment)
                <tr>
                    <td>{{ $appointment->patient_id}}   </td> <br> br
                    <td>{{ $appointment->specialty_id }}   </td>
                    <td>{{ $appointment->doctor_id }}   </td>
                    <td>{{ $appointment->status }}</td>
                        {{-- <a href="{{route('doctors.edit', $appointment->patient) }}">Edit</a>
                        <a href="{{route('doctor_schedules.create', $appointment->patient) }}">Asignar turno</a>
                        <form action="{{ route('doctors.destroy', $appointment->patient) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form> --}}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>