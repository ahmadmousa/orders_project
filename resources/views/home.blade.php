<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Laravel Pagination Demo</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <table class="table table-bordered mb-5">
            <thead>
                <tr class="table-success">
                    <th scope="col">Restaurant id</th>
                    <th scope="col">Notes</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">price</th>
                    <th scope="col">Total price</th>
                    
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $data)
                <tr>
                    <th scope="row">{{ $data->restaurant_id }}</th>
                    <td>{{ $data->notes }}</td>
                    <td>{{ $data->quantity }}</td>
                    <td>{{ $data->price }}</td>
                    <td>{{ $data->netPrice }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

        {{-- Pagination --}}
        <div class="d-flex justify-content-center">
            {!! $orders->withQueryString()->links() !!}
        </div>
    </div>
</body>

</html>