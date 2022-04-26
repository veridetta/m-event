<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Piu extends Model
{
    
    use  HasFactory;

    public function pertanyaan()
    {
        return $this->hasMany(Pertanyaan::class);
    }

    public function prov()
    {
        return $this->belongsTo(Province::class);
    }

    public function kota()
    {
        return $this->belongsTo(Regency::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'foreign_key');
    }

    protected $table = 'piu';
    protected $primaryKey = 'id';

    protected $guarded = ['id'];
}