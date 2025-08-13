<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class kas_perbulan extends Model
{
    protected $table = 'bulan_kas';
    protected $fillable = ['bulan', 'jumlah'];
}
