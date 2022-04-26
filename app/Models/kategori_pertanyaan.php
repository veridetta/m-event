<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kategori_pertanyaan extends Model
{
    use HasFactory;
    protected $table = 'kategori_pertanyaan';
    protected $primaryKey = 'id';

    public function pertanyaan()
    {
        return $this->hasMany(Pertanyaan::class);
    }
}
