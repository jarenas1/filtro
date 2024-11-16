<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>EDIT DOCTOR</h1>
<form action="{{ route('doctors.update', $doctor->id) }}" method="POST">
    @csrf
    @method('PUT') <!-- Indica que se trata de una actualización -->
    
    <input type="text" name="name" value="{{ $doctor->name }}" placeholder="Doctor's Name" required><br>
    
    <select name="specialty_id" required>
        <option value="">Select Specialty</option>
        @foreach ($specialties as $specialty)
            <option value="{{ $specialty->id }}" {{ $specialty->id == $doctor->specialty_id ? 'selected' : '' }}>
                {{ $specialty->name }}
            </option>
        @endforeach
    </select><br>
    
    <input type="email" name="email" value="{{ $doctor->email }}" placeholder="Email" required><br>
    <input type="text" name="phone" value="{{ $doctor->phone }}" placeholder="Phone" required><br>
    
    <textarea name="address" placeholder="Address" required>{{ $doctor->address }}</textarea><br>
    
    <button type="submit">Save</button>
</form>

    </form>

</body>
</html>