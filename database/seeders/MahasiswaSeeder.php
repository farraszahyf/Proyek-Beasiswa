<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Mahasiswa;

class MahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $mahasiswas = [
            [
                'nama' => 'Amalia Suciati',
                'email' => 'amaliasuciati@gmail.com',
                'nomor_hp' => '08123456789',
                'semester' => '5',
                'ipk' => '3.9'
            ],
            [
                'nama' => 'Dhafin Dhihas',
                'email' => 'dhafindhihas@gmail.com',
                'nomor_hp' => '08123456788',
                'semester' => '7',
                'ipk' => '2.9'
            ],
            [
                'nama' => 'Panca Wibawa',
                'email' => 'pancawibawa@gmail.com',
                'nomor_hp' => '08123456777',
                'semester' => '8',
                'ipk' => '3.4'
            ],
            [
                'nama' => 'Paundra Febrian',
                'email' => 'paundrafebrian@gmail.com',
                'nomor_hp' => '08123456666',
                'semester' => '6',
                'ipk' => '3.5'
            ],
            [
                'nama' => 'Prasetya Faiz',
                'email' => 'prasetyafaiz@gmail.com',
                'nomor_hp' => '0812345555',
                'semester' => '1',
                'ipk' => '3.9'
            ],
            [
                'nama' => 'Septian Essra',
                'email' => 'septianessra@gmail.com',
                'nomor_hp' => '081234444',
                'semester' => '3',
                'ipk' => '2.5'
            ],
            [
                'nama' => 'Sari Suksesi',
                'email' => 'sarisuksesi@gmail.com',
                'nomor_hp' => '0812345123',
                'semester' => '8',
                'ipk' => '3.8'
            ]
        ];
        
        foreach ($mahasiswas as $data) {
            mahasiswa::create($data);
        }
    }
}

