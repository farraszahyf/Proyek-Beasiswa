<?php

namespace App\Http\Controllers;

use App\Models\Beasiswa;
use Illuminate\Http\Request;
use App\Models\Mahasiswa;

class BeasiswaController extends Controller
{

    public function show()
    {
        $beasiswas = Beasiswa::all();
        return view('show', ['beasiswas' => $beasiswas]);
    }
    public function create ()
    {
        $mahasiswas = Mahasiswa::all();
        return view('create', compact('mahasiswas'));
    }

    public function home()
    {
        return view('welcome');
    }

    public function store(Request $request)
    {
        // Validasi data
        $validatedData = $request->validate([
            'nama' => 'required|max:255',
            'email' => 'required|email',
            'nomor_hp' => 'required|string|min:10|max:15',
            'semester' => 'required|numeric',
            'ipk' => 'required|numeric',
            'pilihan_beasiswa' => 'required|max:255',
            'berkas' => 'required|file|mimes:pdf,zip,jpg|max:2048'
        ]);

            // Mengambil data IPK dari seeder berdasarkan nama
            $mahasiswa = Mahasiswa::where('nama', $validatedData['nama'])->first();

            // Jika data mahasiswa ditemukan, ambil IPK-nya, jika tidak, biarkan kosong
            $ipk = $mahasiswa ? $mahasiswa->ipk : null;

        //simpan berkas
        if($request->hasFile('berkas')){
            $file = $request->file('berkas');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('public/uploads', $fileName);
        }

         // Simpan data ke dalam database
         Beasiswa::create([
            'nama' => $validatedData['nama'],
            'email' => $validatedData['email'],
            'nomor_hp' => $validatedData['nomor_hp'],
            'semester' => $validatedData['semester'],
            'ipk' => $validatedData['ipk'],
            'pilihan_beasiswa' => $validatedData['pilihan_beasiswa'],
            'berkas' => $fileName // Simpan nama file berkas ke dalam database
        ]);

        return redirect()->route('beasiswa.create')->with('success', 'Pendaftaran Berhasil dan Belum Ter-verifikasi !');
    }
    }
