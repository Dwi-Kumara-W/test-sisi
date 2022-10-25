@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-6 mt-2">
                                <h4>Tambah Data Employee</h4>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">

                        <form action="/create-employee" method="post">
                            @csrf

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="name">Nama Lengkap</label>
                                        <input type="text" name="name" id="name" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="wa">WA</label>
                                        <input type="number" name="wa" id="wa" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="jabatan">Jabatan</label>
                                        <input type="text" name="jabatan" id="jabatan" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" name="email" id="email" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="">Password</label>
                                        <input type="password" name="password" id="password" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <button class="btn btn-primary mt-5" type="submit">Tambah</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
