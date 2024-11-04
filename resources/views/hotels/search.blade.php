<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Results for Hotels</title>
</head>
<body>
    <h1>Search Results for: {{ $search }}</h1>
    
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Location</th>
            </tr>
        </thead>
        <tbody>
            @if ($hotels->isEmpty())
                <tr>
                    <td colspan="2">No hotels found.</td>
                </tr>
            @else
                @foreach ($hotels as $hotel)
                    <tr>
                        <td>{{ $hotel->name }}</td>
                        <td>{{ $hotel->location }}</td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
</body>
</html>
