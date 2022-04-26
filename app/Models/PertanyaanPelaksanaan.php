<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PertanyaanPelaksanaan extends Model
{
    use HasFactory;

    protected $table = 'pertanyaan_pelaksanaans';
    protected $primaryKey = 'id';

    protected $guarded = ['id'];

    public function PelaporanPelaksanaan()
    {
        return $this->belongsTo(PelaporanPelaksanaan::class, 'foreign_key');
    }
    public function kategori()
    {
        return $this->belongsTo(kategori_pertanyaan::class);
    }
    public function kegiatan()
    {
        return $this->belongsTo(kegiatan::class);
    }
    public function piu()
    {
        return $this->belongsTo(Piu::class, 'foreign_key', 'nama_piu');
    }
}
