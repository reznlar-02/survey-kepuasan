<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FormDataDiri extends Model
{
    protected $table = 'form_datadiri';
    protected $fillable = ['nama', 'nrp', 'email', 'strata_id', 'pendidikan_id'];
}