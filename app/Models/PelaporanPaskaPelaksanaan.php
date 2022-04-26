<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PelaporanPaskaPelaksanaan extends Model
{
    use HasFactory;

    protected $table = 'pelaporan_paska_pelaksanaans';
    protected $primaryKey = 'id';

    protected $guarded = ['id'];

    public function PertanyaanPaskaPelaksanaan()
    {
         return $this->hasMany(PertanyaanPaskaPelaksanaan::class, 'foreign_key');
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
