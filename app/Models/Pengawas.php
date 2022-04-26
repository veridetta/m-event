<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengawas extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class, 'foreign_key', 'Level');
    }

    protected $table = 'pengawas';
    protected $primaryKey = 'id';

    protected $guarded = ['id'];
}
