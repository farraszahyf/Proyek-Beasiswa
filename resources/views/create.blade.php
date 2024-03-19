<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Formulir Pendaftaran Beasiswa</title>
      <!-- Bootstrap CSS -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
    <body>

      <!-- Navbar -->

        <nav class="navbar navbar-expand-lg navbar-dark bg-dark d-flex" style="background-color: rgba(0, 0, 0, 0.5);">
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
              <li class="nav-item active">
                <a class="nav-link" href="{{route('home')}}" style="color: #fff;">Beasiswa Bersama</a>
              </li>
            </ul>
            <ul class="navbar-nav ml-auto align-items-center">
              <li class="nav-item">
                <a class="nav-link" href="#" style="color: #fff;">Daftar Beasiswa</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{route('beasiswa.show')}}" style="color: #fff;">Hasil</a>
              </li>
            </ul>
        </div>
    </nav>

        <div class="container">
          <h1 class="text-center mt-5">Formulir Pendaftaran Beasiswa</h1>
          <hr>
          @if (session('success'))
          <div class="alert alert-success">
              {{session('success')}}
      </div>
      @endif

          @if ($errors->any())
              <div class="alert alert-danger">
                  <ul>
                      @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                  </ul>
              </div>
          @endif

    <form action="{{route('beasiswa.store')}}" method="POST" enctype="multipart/form-data">
      @csrf
          <div class="row mb-3">
            <label for="nama" class="col-sm-2 col-form-label">Nama Lengkap</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan nama lengkap" onblur="fillForm()">
            </div>
          </div>

          <div class="row mb-3">
            <label for="email" class="col-sm-2 col-form-label">Alamat Email</label>
            <div class="col-sm-10">
              <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan alamat email">
            </div>
          </div>

          <div class="row mb-3">
            <label for="nomor_hp" class="col-sm-2 col-form-label">Nomor HP</label>
            <div class="col-sm-10">
              <input type="number" class="form-control" id="nomor_hp" name="nomor_hp" placeholder="Masukkan nomor telepon">
            </div>
          </div>

          <div class="row mb-3">
            <label for="semester" class="col-sm-2 col-form-label">Semester Saat Ini</label>
            <div class="col-sm-10">
              <select class="form-select" id="semester" name="semester">
                <option value="">Pilih Semester</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
              </select>
            </div>
          </div>

          <div class="row mb-3">
            <label for="ipk" class="col-sm-2 col-form-label">IPK Terakhir</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="ipk" name="ipk" readonly >
            </div>
          </div>

          <div class="row mb-3">
            <label for="pilihan_beasiswa" class="col-sm-2 col-form-label">Pilihan Beasiswa</label>
            <div class="col-sm-10">
              <select class="form-select" id="pilihan_beasiswa" name="pilihan_beasiswa" disabled>
                <option value="">Pilih Beasiswa</option>
                <option value="beasiswa-akademik">Beasiswa Akademik</option>
                <option value="beasiswa-non-akademik">Beasiswa Non-Akademik</option>
              </select>
            </div>
          </div>

          <div class="row mb-3">
            <label for="berkas" class="col-sm-2 col-form-label">Upload Berkas</label>
            <div class="col-sm-10">
              <input type="file" class="form-control" id="berkas" name="berkas">
            </div>
          </div>
          <button type="submit" id="submit_button"  class="btn btn-success mt-3 mb-5">Daftar</button>
        </form>
    </div>

      <script>
          var mahasiswas = [
            @foreach($mahasiswas as $mahasiswa)
            {
              nama: '{{ $mahasiswa->nama }}',
              email: '{{ $mahasiswa->email }}',
              nomor_hp: '{{ $mahasiswa->nomor_hp }}',
              semester: '{{ $mahasiswa->semester }}',
              ipk: '{{ $mahasiswa->ipk }}'
            },
            @endforeach
          ];

          function fillForm() {
              var inputNama = document.getElementById('nama').value;
              var foundMahasiswa = mahasiswas.find(mahasiswa => mahasiswa.nama === inputNama);
              
              if (foundMahasiswa) {
                  document.getElementById('email').value = foundMahasiswa.email;
                  document.getElementById('nomor_hp').value = foundMahasiswa.nomor_hp;
                  document.getElementById('semester').value = foundMahasiswa.semester;
                  document.getElementById('ipk').value = foundMahasiswa.ipk;

                  // Menonaktifkan pilihan beasiswa jika IPK < 3
                  if (parseFloat(foundMahasiswa.ipk) < 3) {
                      document.getElementById('pilihan_beasiswa').disabled = true;
                      document.getElementById('berkas').disabled = true;
                      document.getElementById('submit_button').disabled = true;
                  } else {
                      document.getElementById('pilihan_beasiswa').disabled = false;
                      document.getElementById('berkas').disabled = false;
                      document.getElementById('submit_button').disabled = false;
                      document.getElementById('pilihan_beasiswa').focus();
                  }
              } else {
                  // Reset nilai input jika nama tidak ditemukan
                  document.getElementById('email').value = '';
                  document.getElementById('nomor_hp').value = '';
                  document.getElementById('semester').value = '';
                  document.getElementById('ipk').value = '';
                  document.getElementById('pilihan_beasiswa').disabled = true;
                  document.getElementById('berkas').disabled = true;
                  document.getElementById('submit_button').disabled = true;
              }
          }
      </script>
