<!-- resources/views/dashboard/index.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <h1>Dashboard</h1>

    <p>Total Hotels: {{ $totalHotels }}</p>
    <p>Total Foods: {{ $totalFoods }}</p>

    <canvas id="foodChart" width="400" height="200"></canvas>
    <canvas id="hotelChart" width="400" height="200"></canvas>

    <script>
        const foodData = @json(array_values($foodMonthlyData));
        const hotelData = @json(array_values($hotelMonthlyData));
        const months = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];

        // Food Chart
        const foodCtx = document.getElementById('foodChart').getContext('2d');
        new Chart(foodCtx, {
            type: 'line',
            data: {
                labels: months,
                datasets: [{
                    label: 'Food Entries per Month',
                    data: foodData,
                    borderColor: 'rgba(75, 192, 192, 1)',
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    fill: true,
                    tension: 0.1
                }]
            }
        });

        // Hotel Chart
        const hotelCtx = document.getElementById('hotelChart').getContext('2d');
        new Chart(hotelCtx, {
            type: 'line',
            data: {
                labels: months,
                datasets: [{
                    label: 'Hotel Entries per Month',
                    data: hotelData,
                    borderColor: 'rgba(255, 99, 132, 1)',
                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                    fill: true,
                    tension: 0.1
                }]
            }
        });
    </script>
</body>
</html>
