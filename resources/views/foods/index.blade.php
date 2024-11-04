<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food Listing</title>
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
        }
        .search-input {
            margin-bottom: 20px;
        }
        #foodResults {
            margin-top: 20px;
            background: #ffffff;
            border-radius: 10px;
            padding: 15px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
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
        <h1>Food Listing</h1>
        
        <div class="input-group search-input">
            <input type="text" id="foodSearch" class="form-control" placeholder="Search foods..." aria-label="Search foods..." />
        </div>
        
        <div id="foodResults"></div>

        <table id="foodTable" class="table table-striped">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Category</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($foods as $food)
                    <tr>
                        <td>{{ $food->name }}</td>
                        <td>{{ $food->category }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="pagination justify-content-center">
            {{ $foods->links() }}
        </div>
    </div>

    <script>
$(document).ready(function() {
    $('#foodSearch').on('keyup', function() {
        let query = $(this).val();

        if (query !== '') {
            $.ajax({
                url: "{{ route('foods.search') }}",
                method: 'GET',
                data: { query: query },
                dataType: 'json',
                success: function(data) {
                    console.log(data); // Check the response
                    let resultsHtml = '<h3>Search Results:</h3><table class="table table-striped"><thead><tr><th>Name</th><th>Category</th></tr></thead><tbody>';
                    if (data.length > 0) {
                        $.each(data, function(index, food) {
                            resultsHtml += '<tr><td>' + food.name + '</td><td>' ;
                        });
                    } else {
                        resultsHtml += '<tr><td colspan="2" class="text-center">No foods found.</td></tr>';
                    }
                    resultsHtml += '</tbody></table>';
                    $('#foodResults').html(resultsHtml);
                },
                error: function(xhr) {
                    console.log(xhr.responseText);
                }
            });
        } else {
            $('#foodResults').html('');
        }
    });
});
</script>


</body>
</html>
