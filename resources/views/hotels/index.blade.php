<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Listing</title>
    <!-- Bootstrap CSS for styling -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Arial', sans-serif;
        }
        .container {
            margin-top: 50px;
        }
        h1 {
            text-align: center;
            margin-bottom: 30px;
            color: #007bff;
            text-shadow: 1px 1px 3px rgba(0, 123, 255, 0.5);
        }
        .search-input {
            margin-bottom: 20px;
        }
        #hotelResults {
            margin-top: 20px;
            background: #ffffff;
            border-radius: 10px;
            padding: 15px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            transition: transform 0.2s;
        }
        #hotelResults:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.3);
        }
        table {
            width: 100%;
            margin-top: 20px;
            border-radius: 10px;
            overflow: hidden;
        }
        th {
            background: linear-gradient(135deg, #007bff, #0056b3);
            color: #fff;
        }
        tr {
            transition: background-color 0.2s;
        }
        tr:hover {
            background-color: rgba(0, 123, 255, 0.1);
        }
        td {
            padding: 10px;
            text-align: left;
        }
        .pagination {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Hotel Listing</h1>
        
        <div class="input-group search-input">
            <input type="text" id="hotelSearch" class="form-control" placeholder="Search hotels..." aria-label="Search hotels..." />
        </div>
        
        <div id="hotelResults"></div>

        <table id="hotelTable" class="table table-striped">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Location</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($hotels as $hotel)
                    <tr>
                        <td>{{ $hotel->name }}</td>
                        <td>{{ $hotel->location }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="pagination justify-content-center">
            {{ $hotels->links() }}
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#hotelSearch').on('keyup', function() {
                let query = $(this).val();

                if (query !== '') {
                    $.ajax({
                        url: "{{ route('hotels.search') }}",
                        method: 'GET',
                        data: { query: query },
                        dataType: 'json',
                        success: function(data) {
                            let resultsHtml = '<h3>Search Results:</h3><table class="table table-striped"><thead><tr><th>Name</th><th>Location</th></tr></thead><tbody>';
                            if (data.length > 0) {
                                $.each(data, function(index, hotel) {
                                    resultsHtml += '<tr><td>' + hotel.name + '</td><td>' + hotel.location + '</td></tr>';
                                });
                            } else {
                                resultsHtml += '<tr><td colspan="2" class="text-center">No hotels found.</td></tr>';
                            }
                            resultsHtml += '</tbody></table>';
                            $('#hotelResults').html(resultsHtml);
                        },
                        error: function(xhr) {
                            console.log(xhr.responseText);
                        }
                    });
                } else {
                    $('#hotelResults').html('');
                }
            });
        });
    </script>
</body>
</html>
