<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengumuman extends Model
{
    use HasFactory;
    protected $table = 'pengumuman';  // Make sure this matches the table name in the database
    protected $fillable = ['title', 'id_strata', 'content']; // Tambahkan strata_id ke $fillable
    
    public function strata()
    {
    return $this->belongsTo(Strata::class, 'id_strata');
    }
}
