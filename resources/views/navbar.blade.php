<!--  NAVBAR -->
<div class="container py-5">
    <div class="shadow p-3 mb-5  fixed-top bg-body-tertiary rounded">
        <div style="background-color: #327a6d;">
            <div class="nav justify-content-center">
                <ul class="nav nav-fill">
                    <li class="nav-item">
                        <a style="color:white;font-size:larger;font-weight:200px; " class="nav-link active"
                            aria-current="page" href="/">BERANDA</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a style="color:white;font-size:larger;font-weight:200px; " class="nav-link dropdown-toggle"
                            data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">PEMERINTAHAN DESA</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="/visi_misi">Visi dan Misi</a></li>
                            <li><a class="dropdown-item" href="/pem_desa">Pemerintah Desa</a></li>
                            <li><a class="dropdown-item" href="/badan_permusyawaratan">Badan Permusyawaratan Desa</a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a style="color:white;font-size:larger;font-weight:200px; " class="nav-link dropdown-toggle"
                            data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">PROFIL DESA</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#"> Sejarah Desa</a></li>
                            <li><a class="dropdown-item" href="#">Profil Wilayah Desa</a></li>
                            <li><a class="dropdown-item" href="#">Arti Lambang Desa</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a style="color:white;font-size:larger;font-weight:200px; " class="nav-link dropdown-toggle"
                            data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">DATA DESA</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Data Wilayah Administratif</a></li>
                            <li><a class="dropdown-item" href="#"> Data Pendidikan Dalam KK</a></li>
                            <li><a class="dropdown-item" href="#"> Data Pendidikan Ditempuh</a></li>
                            <li><a class="dropdown-item" href="/data_pekerjaan"> Data Pekerjaan</a></li>
                            <li><a class="dropdown-item" href="#"> Data Jenis Kelamin</a></li>
                            <li><a class="dropdown-item" href="#"> Data Golongan Darah</a></li>
                            <li><a class="dropdown-item" href="#"> Data Kelompok Umur</a></li>
                            <li><a class="dropdown-item" href="#"> Data Perkawinan</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        @auth
                            <a style="color:white;font-size:larger;font-weight:200px; " class="nav-link " href="/pengaduan" role="button" aria-expanded="false">LAYANAN PENGADUAN</a>
                        @else                            
                            <a style="color:white;font-size:larger;font-weight:200px; " class="nav-link " href="{{ route('login_user') }}" role="button" aria-expanded="false">LAYANAN PENGADUAN</a>
                        @endauth
                    </li>
                    <li class="nav-item dropdown">
                        <a style="color:white;font-size:larger;font-weight:200px; " class="nav-link dropdown-toggle"
                            data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">LEMMAS</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">LPM</a></li>
                            <li><a class="dropdown-item" href="#">Karang Taruna</a></li>
                            <li><a class="dropdown-item" href="#">PKK</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        @can('admin')
                            <a style="color:white;font-size:larger;font-weight:200px; " class="nav-link" href="{{ route('logout.admin') }}">LOGOUT</a>
                        @else
                            @auth
                                <a style="color:white;font-size:larger;font-weight:200px; " class="nav-link" href="{{ route('logout') }}">LOGOUT</a>
                            @else
                                <a style="color:white;font-size:larger;font-weight:200px; " class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">LOGIN</a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="{{ route('login.admin') }}">Administrator</a></li>
                                    <li><a class="dropdown-item" href="{{ route('login_user') }}">Penduduk</a></li>
                                </ul>
                            @endauth
                        @endcan
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div><br>