<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    protected $fillable = ['nama_pasien', 'alamat', 'no_telpon', 'id_rumah_sakit'];

    public function rumahSakit() 
    {
        return $this->belongsTo(RumahSakit::class, 'id_rumah_sakit');
    }
}