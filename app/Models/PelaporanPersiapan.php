<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PelaporanPersiapan extends Model
{
    use HasFactory;
    protected $table = 'pelaporan_persiapans';
     protected $primaryKey = 'id';
 
     protected $guarded = ['id'];

     public function PertanyaanPersiapan()
     {
          return $this->hasMany(PertanyaanPersiapan::class, 'foreign_key');
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
