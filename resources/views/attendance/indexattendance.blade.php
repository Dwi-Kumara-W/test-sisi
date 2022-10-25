@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-6">
                                <h4>Data Employee Attendance</h4>
                            </div>
                            <div class="col-md-6" align="right">
                                <a href="/create-attendance" class="btn btn-primary">Attendance</a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table" id="tableRincian">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Name</th>
                                        <th>Keterangan</th>
                                        <th>Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($employees as $item)
                                        {{-- Modal Edit --}}
                                        <div class="modal fade" id="modalAvatar{{ $item->id }}" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Edit Level</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="{{ route('upload.ava', $item->id) }}" method="post"
                                                            enctype="multipart/form-data">
                                                            @csrf

                                                            <input type="text" name="id_user" value="{{ $item->id }}"
                                                                hidden>

                                                            <div class="form-group">
                                                                <label for="foto">Foto</label>
                                                                <input class="form-control" type="file" name="foto">
                                                            </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Upload</button>
                                                    </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                        {{-- Modal Role --}}
                                        <div class="modal fade" id="modalRole{{ $item->id }}" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Edit Level</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="{{ route('role.store', $item->id) }}" method="post"
                                                            enctype="multipart/form-data">
                                                            @csrf

                                                            <input type="text" name="id_user" value="{{ $item->id }}"
                                                                hidden>

                                                            {{-- <div class="form-group">
                                                                <label for="foto">Pilih Role</label>
                                                                <select class="form-select" name="menu_id"
                                                                    aria-label="Default select example">
                                                                    <option selected>Pilih Menu</option>
                                                                    @foreach ($menu as $row)
                                                                        <option value="{{ $row->id }}">
                                                                            {{ $row->level }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div> --}}
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Tambah</button>
                                                    </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->employee->name }}</td>
                                            <td>{{ $item->keterangan }}</td>
                                            <td>{{ $item->created_at }}</td>

                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
