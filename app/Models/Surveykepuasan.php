<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SurveyKepuasan extends Model
{
    use HasFactory;

    protected $table = 'survey_kepuasan'; // Specify the table name explicitly if it's not the default
    protected $fillable = ['pertanyaan','strata_id', 'pendidikan_id']; // Only these fields are mass-assignable

    /**
     * A survey has many Pertanyaan (questions).
     */
    public function pertanyaan()
    {
        return $this->hasMany(SurveyKepuasan::class, 'survey_kepuasan_id');
    }

    /**
     * A survey belongs to a Strata.
     */
    public function strata()
    {
        return $this->belongsTo(Strata::class, 'strata_id');
    }

    /**
     * A survey belongs to a Pendidikan.
     */
    public function pendidikan()
    {
        return $this->belongsTo(Pendidikan::class, 'pendidikan_id');
    }

    /**
     * Create a survey form and pass data to the view.
     */
    public function createSurveyForm()
    {
        // Fetch all strata and pendidikan data
        $strata = Strata::all();
        $pendidikan = Pendidikan::all();

        // Return the view with the strata and pendidikan data
        return view('survey.create', compact('strata', 'pendidikan'));
    }

    /**
     * If you need to fetch a survey by its related strata and pendidikan
     */
    public function getSurveyWithRelations($surveyId)
    {
        return $this->with(['strata', 'pendidikan', 'pertanyaan'])->findOrFail($surveyId);
    }
}