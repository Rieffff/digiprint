<?php

use Illuminate\Support\Facades\DB;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- PAGE TITLE HERE -->
    <title>{{ config('app.name') }} | Print Transaksi</title>

    <!-- FAVICONS ICON -->
    <link rel="shortcut icon" type="image/png" href="{{ asset('images/favicon.png') }}" />
    <style>
        * {
            font-size: 12px;
            font-family: 'Times New Roman';
        }

        td,
        th,
        tr,
        table {
            border-top: 1px solid black;
            border-collapse: collapse;
        }

        td.description,
        th.description {
            width: 75px;
            max-width: 75px;
        }

        td.quantity,
        th.quantity {
            width: 40px;
            max-width: 40px;
            word-break: break-all;
        }

        td.price,
        th.price {
            width: 40px;
            max-width: 40px;
            word-break: break-all;
        }

        .centered {
            text-align: center;
            align-content: center;
        }

        .ticket {
            width: 155px;
            max-width: 155px;
        }

        img {
            width: 50px;
        }

        @media print {

            .hidden-print,
            .hidden-print * {
                display: none !important;
            }
        }

        .logo-container {
            display: flex;
            justify-content: center;
            align-items: center;
        }
    </style>
</head>

<body>
    <div class="ticket">
        <div class="logo-container">
            <img src="{{ asset('images/logo.png') }}" alt="Logo">
        </div>
        <p class="centered">
            <strong>Barokah Ibu</strong>
            <br>
            <strong>Digital Printing</strong>
            <br>
            <br>
 
            <strong>BUKTI TRANSAKSI</strong><br>
{{ $transaction->created_at ? \Carbon\Carbon::parse($transaction->created_at)->translatedFormat('l, d F Y, H:i') : '-' }}
            <br>ID Trans. : {{ $transaction->tr_id }}
            <br>

            <?php
            $acc_name = DB::table('transactions')
                ->join('users', 'transactions.id_acc', '=', 'users.id')
                ->where('transactions.id_acc', $transaction->id_acc)
                ->value('users.name');
                
             $clName = DB::table('transactions')
    ->join('users', 'transactions.id_acc', '=', 'users.id')
    ->join('class_levels', 'users.id_cl', '=', 'class_levels.cl_id')
    ->where('transactions.id_acc', 3)
    ->value('class_levels.cl_name');

            ?>
            {{ $acc_name }} <br>
            Cust. Level : {{ $clName }}

            <hr>
            <hr>
        </p>
        
         <p class="centered">
               
               <strong> PEMBELIAN BANNER </strong>
                <br> Uk. : {{ $transaction->bnr_pjg }}m x {{ $transaction->bnr_tgi }}m
                <br> Plong : {{ $transaction->plong }} buah
                <br> Konsep : {{ $transaction->konsep }}
                <br> Harga per m² : {{ $transaction->custPrice }}

                @php
                
                $pjg = $transaction->bnr_pjg;
                $tgi = $transaction->bnr_tgi;
                $plong = $transaction->plong;
                $custPrice = $transaction->custPrice;
                
                $hargaPerLembar = 0;
                  if ($plong > 4){
                    $hargaPerLembar = $pjg * $tgi * $custPrice + (($plong - 4) * 1000);
                } else {
                    $hargaPerLembar = $pjg * $tgi * $custPrice;
                }
                
                
                @endphp
                <br> Harga per lembar : Rp {{ number_format($hargaPerLembar, 0, ',', '.') }} 
                <br> Jumlah lembar : {{ $transaction->jumlahLembar }} ply
                
                
            </p>



            <p class="centered">
               
                <strong>Total : </strong>
                
                <br> Rp {{ number_format($transaction->tr_debt, 0, ',', '.') }} 
                
                <br>
             
                <br>
                   ====== LUNAS ======
            </p>
      

    </div>
</body>

</html>

<script>
    // Trigger the print dialog when the page is loaded
    window.onload = function() {
        window.print();
    };
</script>