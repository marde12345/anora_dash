<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    public const TYPES = ['direct' => 'Pekerjaan langsung', 'open' => 'Pekerjaan terbuka'];
    public const LEVELS = [
        'baru' => 'Statistisi Baru (0-20)',
        'entry' => 'Statistisi Entry (21-40)',
        'medium' => 'Statistisi Medium (41-60)',
        'tinggi' => 'Statistisi Tinggi (61-80)',
        'top' => 'Statistisi Top (81-100)'
    ];
    public const TOOLS = [
        'tool1' => 'SPSS',
        'tool2' => 'Python',
        'tool3' => 'R'
    ];
    public const STATUS = ['open' => 'Belum menemukan statistisi', 'closed' => 'Sudah menemukan statistisi'];
    public const SERVICES = [
        'service1' => 'Analisis Regresi',
        'service2' => 'Olah Data',
        'service3' => 'Data Entry',
        'service4' => 'Pembuatan Kuisioner',
        'service5' => 'Konsultasi Statistik'
    ];

    protected $guarded = []; //tambahkan baris ini
}
