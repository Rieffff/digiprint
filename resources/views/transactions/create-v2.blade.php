@extends('layouts.dashboard')
@section('title', 'Tambah Transaksi')
@section('content')
<div class="container-fluid">
    <div class="row">

        <div class="col">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="card-title mb-0">Tambah Transaksi</h4>
                    <div class="btn-group">
                        <button type="button" class="btn btn-primary" onclick="showDiv('banner')">+ Banner</button>
                        <button type="button" class="btn btn-primary" onclick="showDiv('sticker')">+ Sticker</button>
                        <button type="button" class="btn btn-primary" onclick="showDiv('undangan')">+ Undangan</button>
                    </div>
                </div>

                <div class="card-body">
                    <div id="banner" style="display: none;">
                        <form action="{{ route('transactions.store') }}" method="POST">
                            @csrf


                            <div class="row m-4">
                                <div class="col">
                                    <label for="id_acc" class="form-label">Nama Customer</label>


                                    <select class="form-select" id="siswa-select" data-live-search="true">


                                        <option selected disabled>Pilih Customer</option>

                                        @foreach($users as $user)

                                        <option value="{{ $user->id_cl }}|{{ $user->id }}">{{ $user->name }}</option>



                                        @endforeach


                                    </select>
                                </div>

                                <div class="col">
                                    <label for="custPrice" class="form-label">Harga Customer (Rp / m²)</label>
                                    <input type="number" class="form-control" id="custPrice" name="custPrice" maxlength="20" readonly>
                                </div>
                            </div>

                            <div class="row m-4">

                                <!-- <div class="col">-->
                                <!--    <label for="id_acc" class="form-label">User ID</label>-->
                                <!--    <input type="number" class="form-control" id="id_acc" name="id_acc" value="">-->
                                <!--</div>-->


                                <input type="hidden" class="form-control" id="id_acc" name="id_acc" value="">

                                <div class="col">
                                    <label for="bnr_pjg" class="form-label">Panjang (m)</label>
                                    <input type="number" class="form-control" id="bnr_pjg" name="bnr_pjg" step="0.01" maxlength="20" placeholder="Ex : 4,5">
                                </div>
                                <div class="col">
                                    <label for="bnr_tgi" class="form-label">Tinggi (m)</label>
                                    <input type="number" class="form-control" id="bnr_tgi" name="bnr_tgi" step="0.01" maxlength="20" placeholder="Ex : 1,5">
                                </div>
                                <div class="col">
                                    <label for="bnr_tgi" class="form-label">Jumlah Plong (buah)</label>
                                    <input type="number" class="form-control" id="plong" name="plong" maxlength="20" placeholder="0">
                                </div>

                                <div class="col" style="max-width: 150px;">
                                    <label for="konsep" class="form-label">Konsep</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="konsep" value="Desain" checked>
                                        <label class="form-check-label">
                                            Desain
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="konsep" value="Siap Cetak">
                                        <label class="form-check-label">
                                            Siap Cetak
                                        </label>
                                    </div>
                                </div>

                                <div class="row mx-4 my-5">

                                    <div class="col">
                                        <label for="jumlahLembar" class="form-label">Jumlah Lembar (ply)</label>
                                        <input type="number" class="form-control" id="jumlahLembar" name="jumlahLembar" maxlength="20" value="1" placeholder="Masukkan jumlah lembar">
                                    </div>

                                    <div class="col">
                                        <label for="tr_debt" class="form-label">Total Harus Dibayar (Rp)</label>
                                        <div class="input-group input-success">
                                            <span class="input-group-text">Rp</span>
                                            <input type="number" class="form-control" id="tr_debt" name="tr_debt" maxlength="20" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row m-4">
                                <!-- Add other form fields here -->
                                <button type="submit" class="btn btn-primary disabled">Submit (on development)</button>
                            </div>
                        </form>
                    </div>
                    <div id="sticker" style="display: none;">
                        Konten untuk Sticker
                    </div>
                    <div id="undangan" style="display: none;">
                        Konten untuk Undangan
                    </div>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Invoice</h4>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama Barang</th>
                                <th>Jumlah</th>
                                <th>Harga Satuan</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Banner</td>
                                <td>1</td>
                                <td>Rp xxx</td>
                                < <td>Rp xxx</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Sticker</td>
                                <td>2</td>
                                <td>Rp xxx</td>
                                <td>Rp xxx</td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Undangan</td>
                                <td>3</td>
                                <td>Rp xxx</td>
                                <td>Rp xxx</td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="4" class="text-right">Total</td>
                                <td>Rp xxx.000</td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
@section('script')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        // Add event listeners to the input fields
        $('#bnr_pjg, #bnr_tgi, #plong, #siswa-select, input[name="konsep"], #jumlahLembar').on('input change', function() {
            var selectedValue = $('#siswa-select').val(); // Get the selected value, which contains both id_cl and userId
            var values = selectedValue.split('|'); // Split the selected value into an array

            // Extract id_cl and userId
            var selectedCustomerId = values[0]; // Extract id_cl
            var userId = values[1]; // Extract userId

            var custPrice = parseFloat($('#custPrice').val());
            var bnr_pjg = parseFloat($('#bnr_pjg').val());
            var bnr_tgi = parseFloat($('#bnr_tgi').val());
            var plong = parseInt($('#plong').val());
            var selectedKonsep = $('input[name="konsep"]:checked').val();
            var jumlahLembar = parseInt($('#jumlahLembar').val());

            // Define the prices for different customer IDs
            var prices = {
                1: 18000,
                2: 17000,
                3: 15000,
            };

            // Define the prices based on the selected Konsep
            var desainPrices = {
                1: 20000,
                2: 19000,
                3: 17000,
            };
            var siapCetakPrices = {
                1: 18000,
                2: 17000,
                3: 15000,
            };

            // Update the 'custPrice' field based on the selected customer ID and Konsep
            if (prices[selectedCustomerId]) {
                custPrice = (selectedKonsep === 'Desain') ? desainPrices[selectedCustomerId] : siapCetakPrices[selectedCustomerId];
                $('#custPrice').val(custPrice);
                $('#id_acc').val(userId); // Set the userId in the 'id_acc' field
            } else {
                $('#custPrice').val(''); // Clear the field if no matching price is found
                return; // Exit the function if no price is found
            }

            // Calculate the total debt based on the provided logic
            var totalDebt = plong > 4 ?
                (bnr_pjg * bnr_tgi * custPrice * jumlahLembar) + (((plong - 4) * jumlahLembar) * 1000) :
                (bnr_pjg * bnr_tgi * custPrice * jumlahLembar);

            // Update the 'tr_debt' field with the calculated total debt
            $('#tr_debt').val(totalDebt);
        });
    });
</script>

<script>
    function showDiv(id) {
        document.getElementById('banner').style.display = 'none';
        document.getElementById('sticker').style.display = 'none';
        document.getElementById('undangan').style.display = 'none';

        document.getElementById(id).style.display = 'block';
    }
</script>

@endsection