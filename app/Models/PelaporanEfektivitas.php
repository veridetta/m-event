<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PelaporanEfektivitas extends Model
{
    use HasFactory;

    protected $table = 'pelaporan_efektivitas';
    protected $primaryKey = 'id';

    protected $guarded = ['id'];

    public function pertanyaan()
    {
         return $this->hasMany(PertanyaanEfektivitas::class, 'foreign_key');
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
