@extends('layouts.dashboard')
@section('title', 'Data Akun')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Data Akun</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example3" class="display" style="min-width: 845px">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Jenis Akun</th>

                                    <th>Email</th>
                                    <th>Level</th>
                                    <!--<th>Kelas</th>-->
                                    <th>Jenis Kelamin</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach($users as $key => $user)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $user->name ?? '-' }}</td>
                                    <td>{{ $user->role_name ?? '-' }}</td>

                                    <td>{{ $user->email ?? '-' }}</td>
                                    <td>{{ $user->cl_name ?? '-' }}</td>
                                    <!--<td>{{ $user->acc_class ?? '-' }}</td>-->
                                    <td>{{ $user->acc_gender ?? '-' }}</td>
                                    <td>
                                        <div class="d-flex">
                                            <!-- Add the edit and delete links here -->
                                            <!-- <a href="#" class="btn btn-primary shadow sharp me-1" style="padding-left: 10px; padding-right: 10px;">
                                                <i class="fas fa-pencil-alt"></i> &nbsp;Edit
                                            </a> -->
                                            <form action="{{ route('users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Menghapus data akun ini juga akan menghapus data transaksi yang dimiliki akun ini. Apakah anda yakin ?')">
                                                @csrf
                                                @method('DELETE') <!-- Add the method spoofing for DELETE request -->
                                                <button type="submit" class="btn btn-danger shadow sharp" style="padding-left: 10px; padding-right: 10px;">
                                                    <i class="fa fa-trash"></i>&nbsp;Hapus
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>

                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Jenis Akun</th>

                                    <th>Email</th>
                                    <th>Level</th>
                                    <!--<th>Kelas</th>-->
                                    <th>Jenis Kelamin</th>
                                    <th>Aksi</th>
                                </tr>
                            </tfoot>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection