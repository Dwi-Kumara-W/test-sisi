@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-6 mt-2">
                                <h4>Tambah Data Attendance</h4>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">

                        <form action="/create-attendance" method="post">
                            @csrf

                            <div class="row">
                                <div class="mb-3">
                                    <label for="employee">Class</label>
                                    <select name="employee_id" id="employee" class="form-control" required>
                                        <option value="">Select One</option>
                                        @foreach ($employees as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <div class="form-group">
                                        <label for="keterangan">Keterangan</label>
                                        <input type="text" name="keterangan" id="keterangan" class="form-control">
                                    </div>
                                </div>

                            </div>

                            <button class="btn btn-primary mt-2" type="submit">Tambah</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
