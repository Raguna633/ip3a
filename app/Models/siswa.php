<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    protected $table = 'siswas';

    protected $fillable = ['nama_lengkap', 'kelas', 'konsulat', 'gender', 'divisi', 'foto'];

    public function divisi()
    {
        return $this->belongsToMany(Divisi::class, 'divisi_siswa', 'siswa_id', 'divisi_id');
    }

    public function divisiUtama()
    {
        return $this->belongsTo(Divisi::class, 'divisi_utama_id');
    }
}
