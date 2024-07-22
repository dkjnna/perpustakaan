<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kembali extends Model
{
    use HasFactory;
    protected $table= 'kembalis';
    protected $fillable= ['tanggal_pinjam', 'nis', 'noseri', 'tanggal_pengembalian'];
}
