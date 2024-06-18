@extends('layouts.dashboard')
@section('title', 'Edit Class Level')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Edit Level Customer</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('class-levels.update', ['id' => $classLevel->cl_id]) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="cl_name">Nama Level Customer</label>
                            <input type="text" class="form-control" id="cl_name" name="cl_name" value="{{ $classLevel->cl_name }}">
                        </div>
                        <!-- Add other form fields for other properties of ClassLevel if needed -->

                        <button type="submit" class="btn btn-primary">Update Data</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection