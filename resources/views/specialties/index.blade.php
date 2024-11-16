<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Specialties</h1>
    <a href="{{ route('specialties.create') }}">Create New Specialty</a>
                <table>
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($specialties as $specialty)
                            <tr>
                                <td>{{ $specialty->name }}</td>
                                <td>{{ $specialty->description }}</td>
                                <td>
                                    <a href="{{ route('specialties.edit', $specialty) }}">Edit</a>
                                    <form action="{{ route('specialties.destroy', $specialty) }}" method="POST" style="display:inline;">
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
  
