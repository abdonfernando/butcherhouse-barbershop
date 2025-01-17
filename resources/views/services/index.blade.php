<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Services</title>
    <!-- Include Bootstrap for styling -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Manage Services</h2>
        <a href="{{ route('services.create') }}" class="btn btn-primary mb-3">Add New Service</a>
        <ul class="list-group">
            @foreach($services as $service)
                <li class="list-group-item">
                    {{ $service->name }} - Local: {{ $service->price_local }} | Foreigner: {{ $service->price_foreigner }}
                    <a href="{{ route('services.edit', $service->id) }}" class="btn btn-warning btn-sm float-end ms-2">Edit</a>
                    <form action="{{ route('services.destroy', $service->id) }}" method="POST" style="display:inline;">
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
