<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    protected $table = 'siswa';

    protected $fillable = ['nama_lengkap', 'kelas', 'konsulat', 'gender', 'foto'];

    public function divisi()
    {
        return $this->belongsToMany(Divisi::class)->withPivot('alasan')->withTimestamps();
    }
}
