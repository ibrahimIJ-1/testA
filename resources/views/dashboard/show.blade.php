<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
    <title>Document</title>
</head>

<body>
    <div class="row justify-content-center">
        <div class="col-auto">
            <p><span class="text-bold h6 text-capitalize">Merchant: </span>{{ $batch->terminal->merchant_name }}</p>
        </div>
        <div class="col-auto">
            <p><span class="text-bold h6 text-capitalize">TERMINAL ID: </span>{{ $batch->terminal->terminal_id }}</p>
        </div>
        <div class="col-auto">
            <p><span class="text-bold h6 text-capitalize">Batch ID: </span>{{ $batch->batch_id }}</p>
        </div>
        <div class="col-auto">
            <p><span class="text-bold h6 text-capitalize">Total Amount: </span>{{ $batch->TotalAmount }}</p>
        </div>
    </div>
    <div class="row justify-content-center">

        <div class="col-auto">
            <p class="h3 text-bold">>>Cards Report<< </p>
        </div>
    </div>
    <div class="d-flex justify-content-center align-items-center">
        <div class="w-75">
            <table class="table  table-striped">
                <thead>
                    <tr>
                        <th scope="col">TypeName</th>
                        <th scope="col">Payment Type Name</th>
                        <th scope="col">Total Amount</th>
                        <th scope="col">Total Number</th>
                        <th scope="col">SubTotal Amount Formatted</th>
                    </tr>
                </thead>
                <tbody id="tableBody">
                    @isset($batch)
                        @foreach ($batch->summaryReport->cardsReports as $cards)
                            <tr>
                                <th scope="row">{{ $cards->TypeName }}</th>
                                <td>{{ $cards->PaymentTypeName }}</td>
                                <td>{{ $cards->TotalAmount }}</td>
                                <td>{{ $cards->TotalNumber }}</td>
                                <td>{{ $cards->SubTotalAmountFormatted }}</td>
                            </tr>
                        @endforeach
                    @endisset
                </tbody>
            </table>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"
        integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
</body>

</html>
