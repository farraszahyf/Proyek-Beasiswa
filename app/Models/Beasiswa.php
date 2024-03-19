<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Beasiswa extends Model
{
    protected $table = 'beasiswas';
    protected $fillable = [
        'nama',
        'email',
        'nomor_hp',
        'semester',
        'ipk',
        'pilihan_beasiswa',
        'berkas'
    ];
    use HasFactory;
}
