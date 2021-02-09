<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    public const TYPES = ['direct', 'open'];
    public const LEVELS = ['baru', 'entry', 'medium', 'tinggi', 'top'];
    public const TOOLS = ['SPSS', 'Python', 'R'];
    public const SERVICES = ['Analisis Regresi', 'Olah Data', 'Data Entry', 'Pembuatan Kuisioner', 'Konsultasi Statistik'];

    protected $guarded = []; //tambahkan baris ini
}
