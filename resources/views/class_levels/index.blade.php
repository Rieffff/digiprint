@extends('layouts.dashboard')
@section('title', 'Data Sat. Pendidikan')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">data level customer</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example3" class="display" style="min-width: 845px">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Level Customer</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($classLevels as $key => $classLevel)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $classLevel->cl_name }}</td>
                                    <td>
                                        <div class="d-flex">
                                            <!-- Pass the 'id' parameter to the edit route -->
                                            <a href="{{ route('class-levels.edit', ['id' => $classLevel->cl_id]) }}" class="btn btn-primary shadow sharp me-1" style="padding-left: 10px; padding-right: 10px;">
                                                <i class="fas fa-pencil-alt"></i> &nbsp;Edit
                                            </a>
                                            <form action="{{ route('class-levels.destroy', ['id' => $classLevel->cl_id]) }}" method="POST" onsubmit="return confirm('Menghapus data ini juga akan mengosongi data level customer pada data akun customer yang bersangkutan. Apakah anda yakin ? ')">
                                                @csrf
                                                @method('DELETE')
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
                                    <th>Nama Level Customer</th>
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