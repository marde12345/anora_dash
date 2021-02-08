<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class St_user extends Model
{
    use HasFactory;

    private const TOOLS = ['SPSS', 'Python', 'R'];
    private const SERVICES = ['Analisis Regresi', 'Olah Data', 'Data Entry', 'Pembuatan Kuisioner', 'Konsultasi Statistik'];

    protected $guarded = []; //tambahkan baris ini

    // Per get an
    public static function getTools()
    {
        return self::TOOLS;
    }

    public static function getServices()
    {
        return self::SERVICES;
    }
}
