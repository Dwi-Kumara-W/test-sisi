@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-6 mt-2">
                                <h4>Data Employee {{ $employee->name }}</h4>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        Nama Lengkap : {{ $employee->name }} <br>
                        Email : {{ $employee->email }} <br>
                        WA : {{ $employee->wa }} <br>
                        Jabatan : {{ $employee->jabatan }} <br>
                        <br><br>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
