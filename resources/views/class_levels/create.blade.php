<!-- class_levels/create.blade.php -->

@extends('layouts.dashboard')
@section('title', 'Create Class Level')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Tambah Level Customer</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('class-levels.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="cl_name">Nama Level Customer</label>
                            <input type="text" name="cl_name" id="cl_name" class="form-control" required>
                        </div>
                        <!-- Add other fields as needed -->

                        <button type="submit" class="btn btn-primary">+ Tambah Data</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection