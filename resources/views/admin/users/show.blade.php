@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-6 mt-2">
                                <h4>Data Users {{ $user->name }}</h4>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        Nama Lengkap : {{ $user->name }} <br>
                        Email : {{ $user->email }} <br>
                        No HP : {{ $user->no_hp }} <br>
                        WA : {{ $user->wa }} <br>
                        PIN : {{ $user->pin }} <br>
                        Jenis Kelamin : {{ $user->jenis_kelamin }} <br>
                        Status User : {{ $user->status_user }} <br>
                        <br><br>
                        Foto :
                        @foreach ($avatar as $item)
                            <img src="{{ asset('storage/' . $item->foto) }}" alt="" width="200px">
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
