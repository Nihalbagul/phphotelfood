<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Results</title>
</head>
<body>
    <h1>Search Results</h1>
    <ul>
        @if($hotels->isEmpty())
            <li>No hotels found matching your search.</li>
        @else
            @foreach($hotels as $hotel)
                <li>{{ $hotel->name }}</li>
            @endforeach
        @endif
    </ul>
</body>
</html>
