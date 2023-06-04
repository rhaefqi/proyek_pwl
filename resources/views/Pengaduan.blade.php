<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LAYANAN PENGADUAN</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/navbar.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/bootstrap-grid.css">
    <script src="https://kit.fontawesome.com/bc3cf86588.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
    <script src="js/bootstrap.js"></script>
    
</head>
<body style="font-family: serif;">

    <!--  NAVBAR -->
    @include('navbar')

<!--Sebelah Kiri-->

    <div class="row mt-5">
<div class="col-8">
    <div class="pengaduan">
        <div>SAMPAIKAN LAPORAN ANDA</div>
        <hr>
        <form action="" method="post" enctype="multipart/form-data">
          @csrf
    <br>
        <div class="complaint-form-category">
            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" placeholder="Ketik Judul Laporan Anda *" value="{{ old('title') }}" required></textarea>
            <input type="hidden" name="penduduk" value="{{ session('id') }}">
            @error('title')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div><br>
        <div class="complaint-form-category">
            <textarea name="content" id="" rows="6" class="form-control textarea-flex autosize @error('content') is-invalid @enderror" placeholder="Ketik Isi Laporan Anda *" value="{{ old('content') }}" required></textarea>
            @error('content')
            <div class="text-danger">{{ $message }}</div>
            @enderror
          </div><br>
        <div class="complaint-form-category">
            <input type="text" name="lokasi" class="form-control @error('lokasi') is-invalid @enderror" placeholder="Ketik Lokasi Kejadian *" value="{{ old('lokasi') }}" required></textarea>
            @error('lokasi')
            <div class="text-danger">{{ $message }}</div>
            @enderror
          </div>
        <br>
        <select class="form-select" name="category" aria-label="Default select example">
        <option selected>Pilih Kategori Laporan Anda</option>
        @foreach ($category as $categories)
            <option value="{{ $categories->id }}">{{ $categories->category_name }}</option>
        @endforeach
        </select>
        <br>
        <p>Bukti  (jika ada) :</p>
        <div class="complaint-form-category">
            <input type="file"  class="form-control @error('bukti') is-invalid @enderror" name="bukti" placeholder="Ketik Judul Laporan Anda *" value="{{ old('bukti') }}">
            @error('bukti')
            <div class="text-danger">{{ $message }}</div>
            @enderror
          </div><br>
        <div class="tombol">
        <button class="btn btn-danger" type="submit">LAPOR</button>
        </form>
        </div>
</form>                    
    </div>

    <!--Deskripsi-->
<br>
    <div>
        <h4 style="color:#ffa500;"><i class="fa-solid fa-person-circle-question" style="color: #327a6d;"></i>  Apa sih Layanan Pengaduan ?</h4>
        <p>Layanan Pengaduan Desa adalah suatu sistem yang dirancang untuk memfasilitasi masyarakat dalam menyampaikan keluhan, masalah, atau permintaan terkait dengan desa tempat tinggal mereka. Dalam rangka memberikan pelayanan yang lebih baik kepada masyarakat, pemerintah desa  Sukamaju menyediakan platform pengaduan yang mudah diakses seperti formulir online . Ketika masyarakat mengajukan pengaduan, informasi yang relevan dikumpulkan dengan sistematis, termasuk identitas pengadu, detail pengaduan, waktu kejadian, dan bukti pendukung jika ada. Pengaduan yang masuk dicatat dan dilaporkan secara terpusat, sehingga memudahkan pelacakan dan pemantauan. Selanjutnya, pengaduan tersebut ditinjau dengan cermat dan ditangani secara proaktif.</p>
        <p> Pemerintah desa memiliki prosedur yang jelas untuk menyelesaikan pengaduan, dengan melibatkan pihak terkait dan memastikan bahwa setiap pengaduan mendapat respon yang memadai. Dengan adanya layanan pengaduan desa yang efektif, masyarakat dapat berkomunikasi dengan pemerintah desa secara transparan dan memperoleh solusi atau tindakan yang tepat terhadap masalah yang mereka hadapi. Hal ini membantu memperkuat hubungan antara masyarakat dan pemerintah desa serta meningkatkan kualitas pelayanan publik di tingkat lokal.</p>

        <h5 style="color:#ffa500;" ><i class="fa-sharp fa-solid fa-triangle-exclamation" style="color: #327a6d;"></i> Hal-hal yang perlu diperhatikan sebelum melakukan pengaduan</h5>
        <p>1. laporan anda relevan dengan kinerja pemerintah</p>
        <p>2. Menggunakan Bahasa Indonesia yang baik dan benar</p>
        <p>3. Bukan merupakan ujaran kebencian, SARA, dan caci maki </p>
        <p>4. Bukan merupakan laporan yang sudah disampaikan dan masih dalam proses penanganan</p>
    </div> <br>
<hr>
    <h3><i class="fa-solid fa-file-pen" style="color: #327a6d;"></i> Ayo Berani lapor untuk pelayanan publik yang lebih baik !!</h3>
    <hr>
    

   
    
    
	
 </div> <!--col-8-->


<!--SEBELAH KANAN-->

  <!--Waktu dan kalender-->
  <div class="col-4">
  <div class="datetime">
  <div class="time"></div>
  <div class="date"></div>
  </div>
  <br>

  <!--layanan pengaduan desa-->
  <div class="col-4">
  <div class="sudes">
  <div class="bacaan"><i class="fa-solid fa-envelope" style="color: #327a6d;"></i>   LAYANAN PENGADUAN DESA</div>
  <div class="" >
  <a href="Pengaduan.php"><button  style=" background-color:#327a6d;" class="btn" type="button"><b>LAPOR DISINI</b></button></a>
  </div><br>
  </div><br>

  <!--Statistik-->
  <div class="sts px-5">
  <img class="statistik" src="img/statistik.png" alt="" srcset="">
  </div><br>

  <!--Pengumuman-->
  <div class="pemberitahuan px-5">
  <div> <i class="fa-solid fa-link" style="color: #327a6d;"></i> <b>TAUTAN PENTING</b></div>
  <hr>
  <div class=""><a href="https://www.ekon.go.id/publikasi/detail/4600/program-kartu-prakerja-berlanjut-di-tahun-2023-dengan-skema-normal-yang-memberikan-bantuan-pelatihan-lebih-besar">Pendaftaran Program PraKerja</a></div>
  <div class=""><a href="https://gemari.id/gemari/2019/8/12/bpjs-desa-yang-mandiri">BPJS Desa Mandiri</a></div>
  <div class=""><a href="https://rbtv.disway.id/read/8928/daftar-7-blt-yang-cair-juni-2023-pencairan-melalui-bank-himbara-dan-kantor-pos-cek-di-sini">Pembagian BLT</a></div>
  <div class=""><a href="https://litbangkespangandaran.litbang.kemkes.go.id/program-sanitasi-perdesaan-padat-karya/">Program Sanitasi Desa</a></div>
  <div class=""><a href="https://blog.olahkarsa.com/program-pemberdayaan-masyarakat-desa/">Pemberdaan Masyarakat Desa</a></div>
  <div class=""><a href="https://www.masterplandesa.com/wisata/desa-wisata-sebuah-wadah-pengembangan-wilayah-dan-pemberdayaan-masyarakat/">Desa Wisata</a></div>
  </div>


  <!--Perangkat Desa-->

<div class="pemberitahuan1 px-5">
  <p style="text-align: center;" ><i class="fa-solid fa-user" style="color: #327a6d;"></i> <b>PERANGKAT  DESA</b></p><hr>
<div class="slideshow-container">
<div class="mySlides fade">
  <img class="foto" src="img/Rifqy.jpg" style="width:100%">
  <div class="text">Rifqy Jabrah Rhae- Kepala Desa</div>
</div>

<div class="mySlides fade">
  <img  class="foto" src="img/Jessindy.jpg" style="width:100%">
  <div class="text">Jessindy Tanuwijaya-W.Kepala Desa</div>
</div>

<div class="mySlides fade">
  <img  class="foto" src="img/Yohana.jpg" style="width:100%">
  <div class="text">Yohana Marbun-Sekretaris Desa</div>
</div>

<div class="mySlides fade">
  <img  class="foto" src="img/Aliya.jpg" style="width:100%">
  <div class="text">Aliya Afifah-Bendahara Desa</div>
</div>

<div class="mySlides fade">
  <img  class="foto" src="img/Marss.jpg" style="width:100%">
  <div class="text">Marsyaloan Siburian- Kepala Dusun</div>
</div>
</div>

<div style="text-align:center">
  <span class="dot"></span> 
  <span class="dot"></span> 
  <span class="dot"></span> 
  <span class="dot"></span> 
  <span class="dot"></span> 
</div>
</div><br>

<!--maps-->
<div class="pemberitahuan1 px-5">
<p><i class=" fa-sharp fa-solid fa-map" style="color: #327a6d;"></i> <b>  PETA  WILAYAH  DESA</b></p><hr>
<iframe class="maps" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3982.1150028419165!2d98.5719838742212!3d3.560982750484596!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30312f61a43f17af%3A0x63b82c475cf9c21f!2sDESA%20SUKAMAJU%20KECAMATAN%20SUNGGAL%20KAB.DELI%20SERDANG!5e0!3m2!1sen!2sid!4v1685125890692!5m2!1sen!2sid" width="350" height="460" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
</div>
  

  </div> <!--tag penutup col-4-->
    </div><!--penutup row-->
</div><!--penutup container-->
<br><br><br>
<!-- Footer -->
@include('footer')
<script>
let slideIndex = 0;
showSlides();

function showSlides() {
  let i;
  let slides = document.getElementsByClassName("mySlides");
  let dots = document.getElementsByClassName("dot");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}    
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
  setTimeout(showSlides, 2000); // Change image every 2 seconds

  baguetteBox.run('.tz-gallery');
}
</script>
<script src="https://kit.fontawesome.com/bc3cf86588.js" crossorigin="anonymous"></script>
<script src="js/bootstrap.js"></script>
<script src="js/style.js"></script>
</body>
</html>