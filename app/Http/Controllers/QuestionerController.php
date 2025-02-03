<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FormDataDiri;
use App\Models\SurveyKepuasan;
use App\Models\Jawaban; // Pastikan model Jawaban sudah dibuat
use Illuminate\Support\Facades\Validator;

class QuestionerController extends Controller
{
    /**
     * Method untuk menampilkan halaman survey atau form data diri.
     */
    public function index(Request $request)
    {
        // Ambil data diri terakhir dari user berdasarkan session/email
        $dataDiri = FormDataDiri::where('email', $request->session()->get('email'))->latest()->first();

        // Jika data diri belum ada, tampilkan formulir data diri
        if (!$dataDiri) {
            return view('questioner.form'); // Pastikan view ini ada
        }

        $strata_id = $dataDiri->strata_id;
        $pendidikan_id = $dataDiri->pendidikan_id;

        // Ambil pertanyaan berdasarkan strata_id dan pendidikan_id
        $questions = SurveyKepuasan::where(function ($query) use ($strata_id) {
            if (!is_null($strata_id)) {
                $query->where('strata_id', $strata_id);
            }
        })->where(function ($query) use ($pendidikan_id) {
            if (!is_null($pendidikan_id)) {
                $query->where('pendidikan_id', $pendidikan_id);
            }
        })->get();

        // Tampilkan halaman survey
        return view('survey.index', compact('pertanyaan', 'dataDiri')); // Pastikan view ini ada
    }

    /**
     * Method untuk menampilkan form questioner.
     */
    public function form()
    {
        // Ambil data pertanyaan dari database (pastikan model `SurveyKepuasan` benar)
        $pertanyaan = SurveyKepuasan::all();

        // Kirim variabel $pertanyaan ke view
        return view('questioner.form', compact('pertanyaan'));
    }

    /**
     * Method untuk menyimpan data jawaban survey.
     */
    public function store(Request $request)
{
    try {
        // Mendekode data diri dan jawaban dari request
        $dataDiri = $request->input('formdataDiri');
        $jawaban = $request->input('jawaban');

        // Validasi data diri
        $validatedDataDiri = Validator::make($dataDiri, [
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:form_datadiri,email',
            'strata' => 'nullable|string',
            'pendidikan' => 'nullable|string',
        ]);

        if ($validatedDataDiri->fails()) {
            return response()->json(['success' => false, 'errors' => $validatedDataDiri->errors()], 422);
        }

        // Simpan data diri ke tabel `form_datadiri`
        $formDataDiri = FormDataDiri::create($dataDiri);

        // Validasi dan simpan jawaban survey
        foreach ($jawaban as $response) {
            Jawaban::create([
                'form_datadiri_id' => $formDataDiri->id,
                'question_id' => $response['question_id'],
                'answer' => $response['answer'],
            ]);
        }

        return response()->json(['success' => true, 'message' => 'Data berhasil disimpan.']);
    } catch (\Exception $e) {
        return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
    }
}
public function destroy($id)
    {
        try {
            $survey = SurveyKepuasan::findOrFail($id);
            $survey->delete();

            return redirect()->route('survey.index')->with('success', 'Survey berhasil dihapus.');
        } catch (\Exception $e) {
            return redirect()->route('survey.index')->with('error', 'Terjadi kesalahan saat menghapus survey.');
        }
    }
}