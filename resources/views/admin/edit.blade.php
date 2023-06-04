@extends('admin.main')

@section('konten')
    <div class="main-content">
        <div class="row">
            <div class="col-md-12">
                <form action="{{ route('update.data', ['id' => $penduduk->id]) }}" method="post">
                    <div class="modal-body">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="name">Nama</label>
                            <input type="text" class="form-control  @error('name') is-invalid @enderror" id="name" value="{{$penduduk->nama}}"
                                name="name" required>
                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="nik">Nik</label>
                            <input type="text" class="form-control  @error('nik') is-invalid @enderror" id="nik" value="{{$penduduk->nik}}"
                                name="nik" required>
                            @error('nik')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control  @error('email') is-invalid @enderror" id="email" value="{{$penduduk->email}}"
                                name="email" required>
                            @error('email')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="nohp">No Hp</label>
                            <input type="text" class="form-control  @error('nohp') is-invalid @enderror" id="nohp" value="{{$penduduk->no_hp}}"
                                name="nohp" required>
                            @error('nohp')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control  @error('password') is-invalid @enderror" id="password" value="{{$penduduk->password}}"
                                name="password" required>
                            @error('password')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-success">Edit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
