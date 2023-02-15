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
    <div class="d-flex justify-content-center align-items-center">
        <div class="w-75">
            <table class="table  table-striped">
                <thead>
                    <tr>
                        <th scope="col">Batch Id</th>
                        <th scope="col">Total Amount</th>
                        {{-- <th scope="col">Amount</th> --}}
                        {{-- <th scope="col">CardHolder</th> --}}
                        {{-- <th scope="col">CardTypeName</th> --}}
                        <th scope="col">Terminal Id</th>
                        <th scope="col">Merchant Name</th>
                    </tr>
                </thead>
                <tbody id="tableBody">
                    @isset($batches)
                        @foreach ($batches as $batch)
                            <tr>
                                <th scope="row">{{ $batch->batch_id }}</th>
                                <td>{{ $batch->TotalAmount }}</td>
                                <td>{{ $batch->terminal->terminal_id }}</td>
                                <td>{{ $batch->terminal->merchant_name }}</td>
                                <td><a href="{{ route('test.show', $batch->id) }}">See Details</a></td>
                            </tr>
                        @endforeach
                    @endisset
                </tbody>
            </table>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"
        integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    @include('scripts.pusher')
</body>

</html>
