<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Formulir Pendaftaran Beasiswa</title>
      <!-- Bootstrap CSS -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
    <body>

      <!-- Navbar -->

      <nav class="navbar navbar-expand-lg navbar-dark bg-dark d-flex" style="background-color: rgba(0, 0, 0, 0.5);">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
              <li class="nav-item active">
                <a class="nav-link" href="{{route('home')}}" style="color: #fff;">Pilihan Beasiswa</a>
              </li>
            </ul>
            <ul class="navbar-nav ml-auto align-items-center">
                <li class="nav-item">
              <a class="nav-link" href="{{route('beasiswa.create')}}" style="color: #fff;">Daftar Beasiswa</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#" style="color: #fff;">Hasil</a>
            </li>
          </ul>
        </div>
      </nav>

    <div class="container">
      <h1 class="text-center mt-5">Data Pendaftaran Beasiswa</h1>

    <!-- TABEL -->

    <table class="table table table-hover">
      <thead class="thead-dark">
        <tr>
          <th scope="col"class="text-center">#</th>
          <th scope="col"class="text-center">Nama</th>
          <th scope="col"class="text-center">Email</th>
          <th scope="col"class="text-center">Nomor HP</th>
          <th scope="col"class="text-center">Semester</th>
          <th scope="col"class="text-center">IPK</th>
          <th scope="col"class="text-center">Pilihan Beasiswa</th>
          <th scope="col"class="text-center">Berkas</th>
          <th scope="col"class="text-center">Status Ajuan</th>
        </tr>
      </thead>
        <tbody class="table-bordered">
          @forelse ($beasiswas as $beasiswa)
          <tr>
            <th scope="row" class="table-light text-center">{{$loop->iteration}}</th>
            <td scope="row" class="table-light text-center">{{$beasiswa->nama}}</td>
            <td scope="row" class="table-light text-center">{{$beasiswa->email}}</td>
            <td scope="row" class="table-light text-center">{{$beasiswa->nomor_hp}}</td>
            <td scope="row" class="table-light text-center">{{$beasiswa->semester}}</td>
            <td scope="row" class="table-light text-center">{{$beasiswa->ipk}}</td>
            <td scope="row" class="table-light text-center">{{$beasiswa->pilihan_beasiswa}}</td>
            <td scope="row"><a href="{{ asset('storage/uploads/' . $beasiswa->berkas) }}" target="_blank">Lihat Berkas</a></td>
            
            <td scope="row" class="table-light text-center">Belum Verifikasi</td>
          </tr>
          @empty
          <td colspan="6" class="text-center">Tidak ada Data</td>
          @endforelse
        </tbody>
      </table>

    <!-- DONUT CHART -->
    <div class="container">
      <h1 class="text-center mt-3">Grafik Hasil Pendaftaran </h1>
    <div id="chart-container">
    <style>
        #chart-container {
            position: relative;
            width: 400px; 
            height: 400px; 
            margin: 10px auto 20px auto;
        }

        #beasiswaDonutChart {
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
        }
    </style>
    <canvas id="beasiswaDonutChart" width="400" height="400"></canvas>

    <script>
        // Ambil data dari db beasiswa lalu konversi ke array JavaScript
        let beasiswaData = {!! json_encode($beasiswas) !!};
        
        // Inisialisasi objek untuk menyimpan jumlah setiap opsi beasiswa
        let beasiswaCounts = {};

        // Menghitung jumlah pendaftar untuk setiap pilihan beasiswa
        beasiswaData.forEach(function(beasiswa) {
            if (beasiswa.pilihan_beasiswa in beasiswaCounts) {
                beasiswaCounts[beasiswa.pilihan_beasiswa]++;
            } else {
                beasiswaCounts[beasiswa.pilihan_beasiswa] = 1;
            }
        });

        // Menyiapkan label dan jumlah pendaftar untuk grafik
        let labels = Object.keys(beasiswaCounts);
        let counts = Object.values(beasiswaCounts);

        // buat chart
        let ctx = document.getElementById('beasiswaDonutChart').getContext('2d');
        let myChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Jumlah Pendaftar Berdasarkan Pilihan Beasiswa',
                    data: counts,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                }]
            },
            options: {
                responsive: false, // Membuat chart tidak responsif
                maintainAspectRatio: false // Mencegah perbandingan aspek dipertahankan
            }
        });
    </script>
</body>
</html>