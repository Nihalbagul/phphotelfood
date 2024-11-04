<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotels</title>
</head>
<body>
    <h1>Hotel Listing</h1>
    <form action="{{ route('hotels.index') }}" method="GET">
        <input type="text" name="search" placeholder="Search Hotels" value="{{ request()->search }}">
        <button type="submit">Search</button>
    </form>
    <ul>
        @foreach($hotels as $hotel)
            <li>{{ $hotel->name }}</li>
        @endforeach
    </ul>
    {{ $hotels->links() }} <!-- Pagination Links -->
</body>
</html>
