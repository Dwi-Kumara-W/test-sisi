@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-6 mt-2">
                                <h4>Edit Data Employee</h4>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">

                        <form action="/employee-update/{{ $employee->id }}" method="post">
                            {{ method_field('PUT') }}
                            @csrf

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="name">Nama Lengkap</label>
                                        <input type="text" name="name" id="name" class="form-control"
                                            value="{{ $employee->name }}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="wa">WA</label>
                                        <input type="number" name="wa" id="wa" class="form-control"
                                            value="{{ $employee->wa }}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="jabatan">Jabatan</label>
                                        <input type="text" name="jabatan" id="jabatan" class="form-control"
                                            value="{{ $employee->jabatan }}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" name="email" id="email" class="form-control"
                                            value="{{ $employee->email }}">
                                    </div>
                                </div>
                            </div>

                            <button class="btn btn-primary mt-5" type="submit">Edit</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
