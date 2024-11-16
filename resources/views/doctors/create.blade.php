<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    
    <h1>Create New Doctor</h1>
    <form action="{{ route('doctors.store') }}" method="POST">
        @csrf
        <input type="text" name="name" placeholder="Doctor's Name" required><br>
        <select name="specialty_id" required>
            <option value="">Select Specialty</option>
            @foreach ($specialties as $specialty)
                <option value="{{ $specialty->id }}">{{ $specialty->name }}</option>
            @endforeach
        </select><br>
        <input type="email" name="email" placeholder="Email" required><br>
        <input type="text" name="phone" placeholder="Phone" required><br>
        <textarea name="address" placeholder="Address" required></textarea><br>
        <button type="submit">Save</button>
    </form>


</body>
</html>
