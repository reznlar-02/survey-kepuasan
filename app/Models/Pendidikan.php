<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendidikan extends Model
{
    public function kunjungans()
    {
        return $this->hasMany(Kunjungan::class);
    }
}