<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SurveyKepuasan;
use App\Models\Jawaban;

class SurveyKepuasanController extends Controller
{
    /**
     * Menampilkan semua data survey.
     */
    public function index()
    {
        // Ambil semua data survey tanpa relasi
        $survey = SurveyKepuasan::all();

        return view('questioner.survey', compact('survey'));
    }

    /**
     * Menyimpan data survey dan jawaban ke database.
     */
    public function storeSurvey(Request $request)
    {
        // Validasi input survey
        $request->validate([
            'strata_id' => 'nullable|integer',
            'pendidikan_id' => 'nullable|integer',
            'pertanyaan' => 'required|string|max:255',
            'jawaban' => 'nullable|array',
            'jawaban.*' => 'nullable|in:1,2,3,4,5', // Validasi nilai jawaban (1-5)
        ]);

        // Simpan data survey
        $survey = SurveyKepuasan::create([
            'strata_id' => $request->input('strata_id'),
            'pendidikan_id' => $request->input('pendidikan_id'),
            'pertanyaan' => $request->input('pertanyaan'),
        ]);

        // Jika ada jawaban, simpan ke tabel 'jawabans'
        if ($request->has('jawaban')) {
            foreach ($request->input('jawaban') as $pertanyaanId => $jawaban) {
                // Hitung total jawaban jika diperlukan
                $total = array_sum($request->input('jawaban')); // Menjumlahkan semua jawaban

                Jawaban::create([
                    'survey_kepuasan_id' => $survey->id, // ID survey yang baru dibuat
                    'pertanyaan_id' => $pertanyaanId, // ID pertanyaan
                    'jawaban' => $jawaban, // Nilai jawaban
                    'total' => $total, // Total jawaban
                ]);
            }
        }

        // Redirect dengan pesan sukses
        return redirect()->route('survey.index')->with('success', 'Survey berhasil disimpan!');
    }

    /**
     * Menampilkan survey berdasarkan pendidikan_id.
     */
    public function showSurvey($pendidikan_id)
    {
        // Menampilkan survey berdasarkan pendidikan_id
        $survey = SurveyKepuasan::where('pendidikan_id', $pendidikan_id)->get();

        // Mengirim data survey ke view
        return view('questioner.form', compact('survey')); // Pastikan nama view sesuai dengan yang ada
    }

    /**
     * Menghapus survey berdasarkan ID.
     */
    public function destroy($id)
    {
        // Cari survey berdasarkan ID
        $survey = SurveyKepuasan::find($id);

        // Jika survey tidak ditemukan, kembalikan dengan pesan error
        if (!$survey) {
            return redirect()->route('survey.index')->with('error', 'Survey tidak ditemukan.');
        }

        // Hapus survey
        $survey->delete();

        // Redirect dengan pesan sukses
        return redirect()->route('survey.index')->with('success', 'Survey berhasil dihapus!');
    }

    /**
     * Menampilkan rekap data survey.
     */
    public function rekap()
    {
        // Query untuk mendapatkan data pengguna dan kunjungans
        $survey = SurveyKepuasan::join('kunjungans', 'survey_kepuasan.id', '=', 'kunjungans.surveykepuasan_id')
            ->select('users.nama', 'users.email', 'kunjungans.tanggal_kunjungan', 'kunjungans.keperluan', 'users.created_at')
            ->get();

        // Kirim data ke view
        return view('rekap', compact('survey'));
    }
    public function storeAnswer(Request $request)
    {
        // Validasi data yang diterima
        $validatedData = $request->validate([
            'survey_kepuasan_id' => 'required|integer',
            'jawaban' => 'required|integer|min:1|max:5', // Pastikan jawaban antara 1 hingga 5
            'total' => 'required|integer|min:1', // Jumlah klik per tombol
        ]);

        // Menyimpan data jawaban ke dalam tabel 'jawabans'
        Jawaban::create([
            'survey_kepuasan_id' => $request->input('survey_kepuasan_id'), // Jika diperlukan ID survey
            'jawaban' => $validatedData['answer'],
            'total' => $validatedData['count'],
        ]);

        return response()->json([
            'message' => 'Jawaban berhasil disimpan!',
        ]);
    }
}