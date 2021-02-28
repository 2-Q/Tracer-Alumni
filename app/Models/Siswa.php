<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id', 'name', 'nisn', 'jurusan', 'angkatan', 'melanjutkan', 'deskripsi', 'link'
    ];

    public function User()
    {
        return $this->hasOne(new User);
    }

        public function Profesi()
    {
        return $this->hasOne(new Profesi);
    }
}
