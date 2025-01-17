<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Barbers</title>
    <!-- Include Bootstrap for styling -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Manage Barbers</h2>
        <a href="{{ route('barbers.create') }}" class="btn btn-primary mb-3">Add New Barber</a>
        <ul class="list-group">
            @foreach($barbers as $barber)
                <li class="list-group-item">
                    {{ $barber->name }}
                    <a href="{{ route('barbers.edit', $barber->id) }}" class="btn btn-warning btn-sm float-end ms-2">Edit</a>
                    <form action="{{ route('barbers.destroy', $barber->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm float-end">Delete</button>
                    </form>
                </li>
            @endforeach
        </ul>
    </div>

    <!-- Include Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
