<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Divisi extends Model
{
    use HasFactory;

    protected $table = 'divisis';

    protected $fillable = ['nama_divisi', 'foto'];

    public function siswa()
    {
        return $this->belongsToMany(Siswa::class, 'divisi_siswa', 'divisi_id', 'siswa_id');
    }
}
