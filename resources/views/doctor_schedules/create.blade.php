<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Asignar Horario al Doctor: {{ $doctor->name}}</h1>

    <form action="{{ route('doctor_schedules.store', $doctor) }}" method="POST">
        @csrf
        <div>
            <label for="day">Día de la semana</label>
            <select name="day" id="day" required>
                <option value="1">Lunes</option>
                <option value="2">Martes</option>
                <option value="3">Miércoles</option>
                <option value="4">Jueves</option>
                <option value="5">Viernes</option>
                <option value="6">Sábado</option>
                <option value="7">Domingo</option>
            </select>
        </div>
        
        <label for="start_time">Hora de inicio</label>
        <input type="time" name="start_time" id="start_time" required>
    
        <label for="end_time">Hora de fin</label>
        <input type="time" name="end_time" id="end_time" required>
    

        <button type="submit">Asignar Horario</button>
    </form>


</body>
</html>
   