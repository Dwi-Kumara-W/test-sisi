@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-6">
                                <h4>Data Employee</h4>
                            </div>
                            <div class="col-md-6" align="right">
                                <a href="/create-employee" class="btn btn-primary">Tambah</a>
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
                                        <th>Wa</th>
                                        <th>Jabatan</th>
                                        <th>Email</th>
                                        <th>aksi</th>
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
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->wa }}</td>
                                            <td>{{ $item->jabatan }}</td>
                                            <td>{{ $item->email }}</td>
                                            <td>
                                                <a href="employee/{{ $item->id }}"
                                                    class="btn btn-info text-white">Detail</a>
                                                <a href="employee-edit/{{ $item->id }}"
                                                    class="btn btn-primary">Edit</a>
                                                <form action="employee/{{ $item->id }}" method="POST"
                                                    class="d-inline">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                </form>
                                                {{-- <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                                                    data-bs-target="#modalAvatar{{ $item->id }}">
                                                    Avatar
                                                </button> --}}

                                                {{-- <button type="button" class="btn btn-success" data-bs-toggle="modal"
                                                    data-bs-target="#modalRole{{ $item->id }}">
                                                    Role User
                                                </button> --}}
                                            </td>
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
