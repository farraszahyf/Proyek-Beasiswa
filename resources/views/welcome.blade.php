<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BEASISWA</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
    <body>

        <!-- Navbar -->

        <nav class="navbar navbar-expand-lg navbar-dark bg-dark d-flex" style="background-color: rgba(0, 0, 0, 0.5);">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="#" style="color: #fff;">Beasiswa Bersama</a>
            </li>
            </ul>
            <ul class="navbar-nav ml-auto align-items-center">
                <li class="nav-item">
                <a class="nav-link" href="{{route('beasiswa.create')}}" style="color: #fff;">Daftar Beasiswa</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('beasiswa.show')}}" style="color: #fff;">Hasil</a>
            </li>
            </ul>
        </div>
    </nav>

        <div class="container" style="padding: 100px 0;">
        <div class="row">
            <div class="col-md-12 d-flex align-items-center justify-content-center">
            <div class="col-md-6" style="background-color: rgba(255, 255, 255, 0.7);">
                <h2 style="text-align: left; font-size: 36px;">Halo, Selamat datang di<span style="color:rgba(52, 160, 0, 0.8)"> Beasiswa Bersama</span></h2>
                <p style="text-align: left; font-size: 24px;">Temukan informasi terbaru tentang beasiswa dan daftar segera disini.</p>
                <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#popupModal">Beasiswa Akademik</button>
                <button type="button" class="btn btn-dark ml-4" data-bs-toggle="modal" data-bs-target="#popupModal1">Beasiswa Non-Akademik</button>
            </div>

    <!-- Pop Up Beasiswa Akademik -->

        <div class="modal fade" id="popupModal" tabindex="-1" aria-labelledby="popupModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="popupModalLabel">Syarat Beasiswa Akademik</h5>
                </div>
                <div class="modal-body">
                    <p>1. Minimal IPK 3,5</br>
                       2. Surat Rekomendasi Kaprodi</br>
                       3. Juara 1 Lomba Nasional Bidang IT</br>
                       4. Memiliki KIP-K.</br>
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
                </div>
            </div>
            </div>
            
    <!-- Pop Up Beasiswa Non Akademik -->

        <div class="modal fade" id="popupModal1" tabindex="-1" aria-labelledby="popupModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="popupModalLabel">Syarat Beasiswa Non Akademik</h5>
                </div>
                <div class="modal-body">
                    <p>1. Aktif dalam UKM Olahraga</br>
                       2. Surat Rekomendasi Kaprodi</br>
                       3. Juara 1 lomba seni atau olahraga</br>
                       4. Memiliki KIP-K.</br>
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
                </div>
            </div>
            </div>

            <!-- image opening -->
            
            <div class="col-md-4 ml-5">
                <img src="{{ asset('img/328.jpg') }}" alt="Gambar Beasiswa" class="img-fluid mx-auto d-block" style="max-width: 100%; height: auto; margin-left: 20px;">
            </div>
    </div>
  </div>
</div>



<!-- Bootstrap JS (optional) -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<!-- Popper.js -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>

<!-- Bootstrap JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>



</body>
</body>
</html>