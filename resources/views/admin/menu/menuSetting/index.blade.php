@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-6">
                                <h4>Data Menu</h4>
                            </div>
                            <div class="col-md-6" align="right">
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal">
                                    Tambah
                                </button>
                            </div>
                        </div>
                    </div>

                    {{-- Modal Tambah --}}
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Tambah Menu</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('menuManagement.store') }}" method="post"
                                        enctype="multipart/form-data">
                                        @csrf

                                        <div class="form-group">
                                            <label for="level">Level</label>
                                            <select class="form-select" name="id_level" aria-label="Default select example">
                                                <option selected>Pilih Level</option>
                                                @foreach ($level as $item)
                                                    <option value="{{ $item->id }}">{{ $item->level }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="menu">Nama Menu</label>
                                            <input type="text" name="menu_name" id="menu" class="form-control">
                                        </div>

                                        <div class="form-group">
                                            <label for="menu">Link Menu</label>
                                            <input type="text" name="menu_link" id="menu" class="form-control">
                                        </div>

                                        <div class="form-group">
                                            <label for="menu">Icon Menu</label>
                                            <input class="form-control" type="file" name="menu_icon">
                                        </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Tambah</button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table" id="tableRincian">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Menu</th>
                                        <th>Link Menu</th>
                                        <th>Icon Menu</th>
                                        <th>aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($menu as $item)
                                        {{-- Modal Edit --}}
                                        <div class="modal fade" id="modalEdit{{ $item->id }}" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Edit Level</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="{{ route('menuManagement.update', $item->id) }}"
                                                            method="post" enctype="multipart/form-data">
                                                            {{ method_field('PUT') }}
                                                            @csrf

                                                            <div class="form-group">
                                                                <label for="level">Level</label>
                                                                <select class="form-select" name="id_level"
                                                                    aria-label="Default select example">
                                                                    <option selected>Pilih Level</option>
                                                                    @foreach ($level as $data)
                                                                        <option value="{{ $data->id }}">
                                                                            {{ $data->level }}</option>
                                                                        <input type="text" name="namaLevel"
                                                                            value="{{ $data->level }}" hidden>
                                                                    @endforeach
                                                                </select>
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="menu">Nama Menu</label>
                                                                <input type="text" name="menu_name" id="menu"
                                                                    class="form-control" value="{{ $item->menu_name }}">
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="menu">Link Menu</label>
                                                                <input type="text" name="menu_link" id="menu"
                                                                    class="form-control" value="{{ $item->menu_link }}">
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="menu">Icon Menu</label>
                                                                <input class="form-control" type="file"
                                                                    name="menu_icon">
                                                            </div>
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
                                            <td>{{ $item->menu_name }}</td>
                                            <td>{{ $item->menu_link }}</td>
                                            <td>
                                                <img src="{{ asset('storage/' . $item->menu_icon) }}" alt=""
                                                    width="50px">
                                            </td>
                                            <td>
                                                {{-- <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                                                    data-bs-target="#modalEdit{{ $item->id }}">
                                                    Edit
                                                </button> --}}
                                                <form action="/menu-delete/{{ $item->id }}" method="POST"
                                                    class="d-inline">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                </form>
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
