<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{ route('appoiments.store') }}" method="POST">
        @csrf
        <label for="patient_id">Paciente:</label>
        <select name="patient_id" id="patient_id">
            @foreach ($patients as $patient)
                <option value="{{ $patient->id }}">{{ $patient->name }}</option>
            @endforeach
        </select>
    
        <label for="doctor_id">Doctor:</label>
        <select name="doctor_id" id="doctor_id">
            @foreach ($doctors as $doctor)
                <option value="{{ $doctor->id }}">{{ $doctor->name }}</option>
            @endforeach
        </select>
    
        <label for="scheduled_at">Fecha y hora de la cita:</label>
        <input type="datetime-local" name="scheduled_at" id="scheduled_at">
    
        <label for="notes">Notas (opcional):</label>
        <textarea name="notes" id="notes"></textarea>
    
        <button type="submit">Asignar cita</button>
    </form>
    
</body>
</html>