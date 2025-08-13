<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $table = 'siswa';
    protected $fillable = ['nama', 'nis', 'jenis_kelamin', 'alamat'];

    public function kas()
    {
        return $this->hasMany(Kas::class, 'siswa_id');
    }
}
