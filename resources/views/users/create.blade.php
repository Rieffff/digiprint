@extends('layouts.dashboard')
@section('title', 'Tambah Akun')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Tambah Akun</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('users.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="name" name="name" autofocus required placeholder="Masukkan nama ...">
                        </div>
                        <div class="mb-3">
                            <label for="id_role" class="form-label">Jenis Akun</label>
                            <select class="form-select" id="id_role" name="id_role" required>
                                <option selected disabled>Pilih Jenis Akun</option>
                                <option value="1">Admin</option>
                                <option value="2">Supervisor</option>
                                <option value="3">Customer</option>

                            </select>
                        </div>
                        <div class="mb-3" id="emailAndPassword">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email_input" name="email_input" autocomplete="off" placeholder="Masukkan email...">

                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password_input" name="password_input" autocomplete="off" placeholder="Masukkan password...">
                        </div>



                        <div class="mb-3">
                            <label for="id_cl" class="form-label">Level Customer</label>
                            <select class="form-select" id="id_cl" name="id_cl" required>
                                <option selected disabled>Pilih Level Customer</option>

                                @foreach($classLevels as $classLevel)
                                <option value="{{ $classLevel->cl_id }}">{{ $classLevel->cl_name }}</option>
                                @endforeach
                            </select>
                        </div>

 <div class="mb-3">
                            <label for="alamat" class="form-label">Alamat</label>
                            <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Masukkan alamat ...">
                        </div>
                        
                         <div class="mb-3">
                            <label for="noHp" class="form-label">No. HP</label>
                            <input type="text" class="form-control" id="noHp" name="noHp" placeholder="Masukkan no. HP. Ex : 081321654987">
                        </div>

                        <div class="mb-3">
                            <label for="acc_gender" class="form-label">Gender</label>
                            <select class="form-select" id="acc_gender" name="acc_gender" required>
                                <option selected disabled>Pilih Jenis Kelamin</option>

                                <option value="Laki - Laki">Laki - Laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection