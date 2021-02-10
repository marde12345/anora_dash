<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StUser extends Model
{
    use HasFactory;

    public const TOOLS = ['SPSS', 'Python', 'R'];
    public const SERVICES = ['Analisis Regresi', 'Olah Data', 'Data Entry', 'Pembuatan Kuisioner', 'Konsultasi Statistik'];

    protected $guarded = []; //tambahkan baris ini
}
