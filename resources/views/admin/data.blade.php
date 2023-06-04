@extends('admin.main')


@section('konten')
    <div class="main-content">
        <div class="row">
            <div class="col-md-12">
                <div class="table-wrapper">
                    @if (session('status'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>
                                Berhasil!
                            </strong>
                            {{ session('status') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @elseif(session('edit_status'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>
                                Berhasil!
                            </strong>
                            {{ session('edit_status') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @elseif(session('hapus_status'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>
                                Berhasil!
                            </strong>
                            {{ session('hapus_status') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    <div class="table-title">
                        <div class="row">
                            <div class="col-sm-6 p-0 flex justify-content-lg-start justify-content-center">
                                <h2 class="ml-lg-2">Data Penduduk</h2>
                            </div>
                            <div class="col-sm-6 p-0 flex justify-content-lg-end justify-content-center">
                                <a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal">
                                    <i class="material-icons">&#xE147;</i>
                                    <span>Tambah data penduduk</span>
                                </a>
                                <a href="#deleteEmployeeModal" class="btn btn-danger" data-toggle="modal">
                                    <i class="material-icons">&#xE15C;</i>
                                    <span>hapus</span>
                                </a>
                            </div>
                        </div>
                    </div>

                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th><span class="custom-checkbox">
                                        <input type="checkbox" id="selectAll">
                                        <label for="selectAll"></label></th>
                                <th>Nama</th>
                                <th>NIK</th>
                                <th>Email</th>
                                <th>No Hp</th>
                                <th>Actions</th>
                            </tr>
                        </thead>

                        <tbody>
                            {{-- @php($i = 1) --}}
                            @foreach ($penduduk as $penduduk)
                                <tr>
                                    <th><span class="custom-checkbox">
                                            <input type="checkbox" id="checkbox1" name="option[]" value="1">
                                            <label for="checkbox1"></label></th>
                                    <th>{{ $penduduk->nama }}</th>
                                    <th>{{ $penduduk->nik }}</th>
                                    <th>{{ $penduduk->email }}</th>
                                    <th>{{ $penduduk->no_hp }}</th>
                                    <th>
                                        <div class="row">
                                            <div class="col-6">
                                                <a href="{{ route('edit.data', ['id' => $penduduk->id]) }}" class="edit">
                                                    <i class="material-icons" title="Edit">&#xE254;</i>
                                                </a>
                                            </div>
                                            <div class="col-6">
                                                <form action="{{ route('penduduk.delete', ['id' => $penduduk->id]) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger"
                                                        onclick="return confirm('Yakin mau menghapus')">
                                                        x
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </th>
                                </tr>
                            @endforeach
                        </tbody>


                    </table>

                    {{-- <div class="clearfix">
                        <div class="hint-text">showing <b>5</b> out of <b>25</b></div>
                        <ul class="pagination">
                            <li class="page-item disabled"><a href="#">Previous</a></li>
                            <li class="page-item "><a href="#"class="page-link">1</a></li>
                            <li class="page-item "><a href="#"class="page-link">2</a></li>
                            <li class="page-item active"><a href="#"class="page-link">3</a></li>
                            <li class="page-item "><a href="#"class="page-link">4</a></li>
                            <li class="page-item "><a href="#"class="page-link">5</a></li>
                            <li class="page-item "><a href="#" class="page-link">Next</a></li>
                        </ul>
                    </div> --}}









                </div>
            </div>


            <!----add-modal start--------->
            <div class="modal fade" tabindex="-1" id="addEmployeeModal" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Tambah Data</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <form action="{{ route('store_data') }}" method="post">
                            <div class="modal-body">
                                @csrf
                                <div class="form-group">
                                    <label for="name">Nama</label>
                                    <input type="text" class="form-control  @error('name') is-invalid @enderror"
                                        id="name" name="name" required>
                                    @error('name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="nik">Nik</label>
                                    <input type="text" class="form-control  @error('nik') is-invalid @enderror"
                                        id="nik" name="nik" required>
                                    @error('nik')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control  @error('email') is-invalid @enderror"
                                        id="email" name="email" required>
                                    @error('email')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="nohp">No Hp</label>
                                    <input type="text" class="form-control  @error('nohp') is-invalid @enderror"
                                        id="nohp" name="nohp" required>
                                    @error('nohp')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control  @error('password') is-invalid @enderror"
                                        id="password" name="password" required>
                                    @error('password')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-success">Tambah</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>

            <!----edit-modal end--------->





            <!----edit-modal start--------->
            {{-- <div class="modal fade" tabindex="-1" id="editEmployeeModal" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="userCrudModal">Edit Penduduk</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        {{-- @php(
                        // use App\Models\Penduduk;
                        // $ependuduk = route('edit_data')
                    ) --}}

            {{-- <form action="{{ route('store_data') }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="name">Nama</label>
                                    <input type="text" class="form-control  @error('name') is-invalid @enderror"
                                        id="name" name="name" value="{{ $penduduk->nama }}" required>
                                    @error('name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="nik">Nik</label>
                                    <input type="text" class="form-control  @error('nik') is-invalid @enderror"
                                        id="nik" name="nik" required>
                                    @error('nik')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control  @error('email') is-invalid @enderror"
                                        id="email" name="email" required>
                                    @error('email')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="nohp">No Hp</label>
                                    <input type="text" class="form-control  @error('nohp') is-invalid @enderror"
                                        id="nohp" name="nohp" required>
                                    @error('nohp')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                <button type="submit" id="submit" class="btn btn-success">Tambah</button>
                            </div>
                        </form> 

                    </div>
                </div>
            </div> --}}

            <!----edit-modal end--------->


            <!----delete-modal start--------->
            <div class="modal fade" tabindex="-1" id="deleteEmployeeModal" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Hapus data</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>Yakin mau menghapus data?</p>
                            <p class="text-warning"><small>data akan hilang selamanya,</small></p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>

                        </div>
                    </div>
                </div>
            </div>

            <!----edit-modal end--------->




        </div>
    </div>
@endsection
