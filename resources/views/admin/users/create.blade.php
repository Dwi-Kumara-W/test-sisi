@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-6 mt-2">
                                <h4>Tambah Data User</h4>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">

                        <form action="{{ route('userManagement.store') }}" method="post">
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
                                        <label for="email">Email</label>
                                        <input type="email" name="email" id="email" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Nomor Hp</label>
                                        <input type="text" name="no_hp" id="no_hp" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="wa">Nomor WA</label>
                                        <input type="text" name="wa" id="wa" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="pin">PIN</label>
                                        <input type="number" name="pin" id="pin" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Jenis Kelamin</label>
                                        <select class="form-select" id="" name="jenis_kelamin">
                                            <option selected>Pilih Jenis Kelamin</option>
                                            <option value="Laki-laki">Laki-laki</option>
                                            <option value="Perempuan">Perempuan</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <div class="form-group mt-3">
                                        <label for="">Password</label>
                                        <input type="password" name="password" id="password" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mt-3">
                                        <label for="">Status User</label>
                                        <input type="text" name="status_user" id="status_user" class="form-control">
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
