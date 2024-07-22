<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pinjam extends Model
{
    use HasFactory;
    protected $table = 'pinjams';
    protected $fillable = ['tanggal_pinjam', 'nis', 'noseri', 'tanggal_pengembalian', 'kode_admin'];
}
