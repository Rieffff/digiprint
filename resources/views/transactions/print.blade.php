<!DOCTYPE html>
<html>

<head>
    <title>{{ config('app.name') }} | Print Transaksi Tabungan</title>
    <link rel="shortcut icon" type="image/png" href="{{ asset('images/favicon.png') }}" />

    <link href="https://netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

</head>

<body>

    <!------ Include the above in your HEAD tag ---------->
    <div class="container">
        <div class="row">
            <div class="col">

                <div class="row">
                    <!-- <div class="panel panel-primary"> -->
                    <!-- Default panel contents -->

                    <div class="row text-center">
                        <h3> <strong> Barokah Ibu Digital Printing </strong></h3>
                        <h3>Histori Transaksi Lengkap</h3>
                    </div>
                    <ul class="list-group">
                        @foreach($transactions as $accountId => $accountTransactions)
                        <li class="list-group-item">
                            <h4>Transaksi A.n. {{ $accountTransactions[0]->acc_name }} | Level Customer : {{ $accountTransactions[0]->cl_name }} </h4>
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Tanggal</th>
                                        <th>ID Transaksi</th>
                                        <th>Nominal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $counter = 1 @endphp
                                    @php
                                    $saldo = 0;
                                    @endphp

                                    @foreach($accountTransactions as $transaction)
                                    <tr>
                                        <td>{{ $counter }}</td>
                                        <td>
                                            {{ $transaction->created_at ? \Carbon\Carbon::parse($transaction->created_at)->translatedFormat('l, d F Y, H:i') : '-' }}
                                        </td>
                                        <td>{{ $transaction->tr_id }}</td>
                                        <td>
                                            @if ($transaction->tr_debt !== null)
                                            Rp {{ number_format($transaction->tr_debt, 0, ',', '.') }}
                                            @else
                                            -
                                            @endif
                                        </td>
                   
                                    </tr>
                                    @php $counter++ @endphp
                                    @endforeach

                                </tbody>
                            </table>
                        </li>
                        @endforeach
                    </ul>
                    <div class="text-right" style="margin: 50px;">
                        <p>Mengetahui,</p>
                        <p style="text-underline-position: below;"><strong>Owner</strong> </p>

                        </br>
                        </br>
                        <p style="text-underline-position: below;"><strong>Agus</strong> </p>

                    </div>
                    <!-- </div> -->

                </div>

            </div>
        </div>
    </div>

    <!-- Add the Bootstrap JS and jQuery -->
    <script src="https://netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>

    <script>
        // Trigger the print dialog when the page is loaded
        window.onload = function() {
            window.print();
        };
    </script>
</body>

</html>