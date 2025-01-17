<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Booking</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Edit Your Booking</h2>
        <form action="{{ route('bookings.update', $booking->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="service_id" class="form-label">Choose a Service:</label>
                <select name="service_id" id="service_id" class="form-control">
                    @foreach($services as $service)
                        <option value="{{ $service->id }}" {{ $booking->service_id == $service->id ? 'selected' : '' }}>
                            {{ $service->name }} - Local: {{ $service->local_price }} | Foreigner: {{ $service->foreigner_price }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="barber_id" class="form-label">Choose a Barber:</label>
                <select name="barber_id" id="barber_id" class="form-control">
                    @foreach($barbers as $barber)
                        <option value="{{ $barber->id }}" {{ $booking->barber_id == $barber->id ? 'selected' : '' }}>
                            {{ $barber->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="status" class="form-label">Status:</label>
                <select name="status" id="status" class="form-control">
                    <option value="Pending" {{ $booking->status == 'Pending' ? 'selected' : '' }}>Pending</option>
                    <option value="Confirmed" {{ $booking->status == 'Confirmed' ? 'selected' : '' }}>Confirmed</option>
                    <option value="Canceled" {{ $booking->status == 'Canceled' ? 'selected' : '' }}>Canceled</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Update Booking</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
