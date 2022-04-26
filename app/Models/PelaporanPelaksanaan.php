<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PelaporanPelaksanaan extends Model
{
    use HasFactory;

    protected $table = 'pelaporan_pelaksanaans';
     protected $primaryKey = 'id';
 
     protected $guarded = ['id'];

     public function PertanyaanPelaksanaan()
     {
          return $this->hasMany(PertanyaanPelaksanaan::class, 'foreign_key');
     }
     public function kategori()
     {
          return $this->belongsTo(kategori_pertanyaan::class);
     }
     public function kegiatan()
     {
          return $this->belongsTo(kegiatan::class);
     }
}
