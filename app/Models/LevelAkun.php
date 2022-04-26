<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class levelakun extends Model
{
    use HasFactory;

    protected $table = 'level_akun';
    protected $primaryKey = 'id';

    protected $guarded = ['id'];
    
    public function user()
    {
        return $this->hasMany(user::class);
    }
}
