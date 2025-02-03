<?php

namespace App\Http\Controllers;

use App\Models\Strata;
use App\Models\Pendidikan;
use Illuminate\Http\Request;

class StrataController extends Controller
{
public function showForm()
{
    $strata = Strata::all();  // Fetch all strata records
    return view('questioner.form', compact('strata'));  // Pass to the view
}
}