<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Survey Kepuasan</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"></link>
</head>
<body class="bg-gray-100 text-gray-800">
    <header class="bg-blue-800 text-white py-20 text-center relative">
        <h1 class="text-4xl font-bold">Survey Kepuasan</h1>
        <div class="tabs flex justify-center bg-gray-200 p-4 rounded-lg absolute bottom-0 transform translate-y-1/2 w-11/12 mx-auto shadow-lg">
            <button class="tab-button bg-blue-700 text-white py-2 px-4 rounded-lg mx-2" data-tab="survey-form">Form Survey</button>
            <button class="tab-button bg-blue-700 text-white py-2 px-4 rounded-lg mx-2" data-tab="survey-list">Daftar Survey</button>
            <button class="tab-button bg-blue-700 text-white py-2 px-4 rounded-lg mx-2" data-tab="rekap">Rekap Jawaban</button>
        </div>
    </header>

    <main class="mt-20">
        <!-- Survey Form Section -->
        <div class="tab-content hidden" id="survey-form">
            <h2 class="text-2xl font-bold mb-4">Form untuk Menambahkan Survey Baru</h2>
            <form action="{{ route('survey.store') }}" method="POST" class="bg-white p-6 rounded-lg shadow-md">
                @csrf
                <div class="form-group mb-4">
                    <label for="pertanyaan" class="block font-bold mb-2">Pertanyaan:</label>
                    <input type="text" name="pertanyaan" id="pertanyaan" required class="w-full p-2 border border-gray-300 rounded-lg">
                </div>
                <div class="form-group mb-4">
                    <label for="strata_id" class="block font-bold mb-2">Strata ID:</label>
                    <input type="number" name="strata_id" id="strata_id" class="w-full p-2 border border-gray-300 rounded-lg">
                </div>
                <div class="form-group mb-4">
                    <label for="pendidikan_id" class="block font-bold mb-2">Pendidikan ID:</label>
                    <input type="number" name="pendidikan_id" id="pendidikan_id" class="w-full p-2 border border-gray-300 rounded-lg">
                </div>
                <button type="submit" class="bg-blue-800 text-white py-2 px-4 rounded-lg">Simpan Survey</button>
            </form>
        </div>

        <!-- Survey List Section -->
        <div class="tab-content hidden" id="survey-list">
            <h2 class="text-2xl font-bold mb-4">Daftar Survey</h2>
            <ul class="bg-white p-6 rounded-lg shadow-md">
                @if(isset($survey) && count($survey) > 0)
                    @foreach ($survey as $item)
                        <li class="bg-gray-200 p-4 mb-2 rounded-lg shadow-sm">
                            {{ $item->pertanyaan }} <br>
                            <form action="{{ route('survey.delete', $item->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Apakah Anda yakin ingin menghapus pertanyaan ini?')" class="bg-red-500 text-white py-1 px-2 rounded-lg">Hapus</button>
                            </form>
                        </li>
                    @endforeach
                @else
                    <li class="bg-gray-200 p-4 mb-2 rounded-lg shadow-sm">Tidak ada survey yang tersedia.</li>
                @endif
            </ul>
            @if(session('success'))
            <div class="alert alert-success bg-green-500 text-white p-4 rounded-lg mt-4">
                {{ session('success') }}
            </div>
            @endif

            @if(session('error'))
            <div class="alert alert-danger bg-red-500 text-white p-4 rounded-lg mt-4">
                {{ session('error') }}
            </div>
            @endif
        </div>

        <!-- Rekap Jawaban Section -->
        <div class="tab-content hidden" id="rekap">
            <h2 class="text-2xl font-bold mb-4">Rekapitulasi Jawaban</h2>
            <canvas id="chartRekap" width="400" height="200" class="mb-6"></canvas>

            <!-- Tabel Data Pengguna -->
            <h3 class="text-xl font-bold mb-4">Data Pengguna</h3>
            <table class="w-full border-collapse bg-white rounded-lg shadow-md">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="border p-2">No</th>
                        <th class="border p-2">Nama</th>
                        <th class="border p-2">Nrp</th>
                        <th class="border p-2">Email</th>
                        <th class="border p-2">Tanggal Isi</th>
                        <th class="border p-2">Strata</th>
                        <th class="border p-2">Pendidikan</th>
                    </tr>
                </thead>
                <tbody>
                    @if(isset($users) && count($users) > 0)
                        @foreach($users as $index => $user)
                        <tr>
                            <td class="border p-2">{{ $index + 1 }}</td>
                            <td class="border p-2">{{ $user->name }}</td>
                            <td class="border p-2">{{ $user->nrp }}</td>
                            <td class="border p-2">{{ $user->email }}</td>
                            <td class="border p-2">{{ $user->created_at }}</td>
                            <td class="border p-2">{{ $user->strata_name }}</td>
                            <td class="border p-2">{{ $user->pendidikan_name }}</td>
                        </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="7" class="border p-2 text-center">Belum ada data pengguna yang mengisi form.</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>

        <div id="surveyContainer" class="mt-6"></div>

        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            const surveyQuestionContainer = document.getElementById("surveyContainer");
            let questions = [];
            let currentQuestionIndex = 0;
            let responses = {};

            async function fetchQuestions() {
                try {
                    const response = await fetch("http://example.com/api/getQuestions");
                    if (!response.ok) throw new Error("Gagal mendapatkan pertanyaan.");
                    questions = await response.json();
                    showQuestion();
                } catch (error) {
                    console.error("Error:", error);
                    // surveyQuestionContainer.innerHTML = "<p>Gagal memuat pertanyaan.</p>";
                }
            }

            function showQuestion() {
                if (currentQuestionIndex < questions.length) {
                    const question = questions[currentQuestionIndex];
                    surveyQuestionContainer.innerHTML = `
                        <div class="survey-question bg-white p-6 rounded-lg shadow-md">
                            <label class="block font-bold mb-2">${question.pertanyaan}</label>
                            <div class="survey-options">
                                <label class="block mb-2">
                                    <input type="radio" name="jawaban" value="1" onclick="recordAnswer(${question.id}, 1)"> Sangat Tidak Puas
                                </label>
                                <label class="block mb-2">
                                    <input type="radio" name="jawaban" value="2" onclick="recordAnswer(${question.id}, 2)"> Tidak Puas
                                </label>
                                <label class="block mb-2">
                                    <input type="radio" name="jawaban" value="3" onclick="recordAnswer(${question.id}, 3)"> Netral
                                </label>
                                <label class="block mb-2">
                                    <input type="radio" name="jawaban" value="4" onclick="recordAnswer(${question.id}, 4)"> Puas
                                </label>
                                <label class="block mb-2">
                                    <input type="radio" name="jawaban" value="5" onclick="recordAnswer(${question.id}, 5)"> Sangat Puas
                                </label>
                            </div>
                        </div>`;
                } else {
                    surveyQuestionContainer.innerHTML = "<p>Terima kasih telah menyelesaikan survei!</p>";
                    showRekap();
                }
            }

            function recordAnswer(questionId, value) {
                responses[questionId] = value;
                currentQuestionIndex++;
                showQuestion();
            }

            function showRekap() {
                const counts = [0, 0, 0, 0, 0];

                for (const key in responses) {
                    counts[responses[key] - 1]++;
                }

                const ctx = document.getElementById("chartRekap").getContext("2d");
                new Chart(ctx, {
                    type: "bar",
                    data: {
                        labels: ["Sangat Tidak Puas", "Tidak Puas", "Netral", "Puas", "Sangat Puas"],
                        datasets: [
                            {
                                label: "Jumlah Tanggapan",
                                data: counts,
                                backgroundColor: ["#ff4d4d", "#ff9999", "#ffff99", "#99ff99", "#4dff4d"],
                            },
                        ],
                    },
                });
            }

            fetchQuestions();
        </script>
    </main>

    <footer class="text-center mt-6 text-gray-600">
        &copy; Survey Kepuasan TNI Angkatan Laut. Semua Hak Dilindungi.
    </footer>

    <script>
        const tabButtons = document.querySelectorAll('.tab-button');
        const tabContents = document.querySelectorAll('.tab-content');

        tabButtons.forEach(button => {
            button.addEventListener('click', () => {
                const targetTab = button.getAttribute('data-tab');

                tabContents.forEach(content => {
                    content.classList.add('hidden');
                });

                document.getElementById(targetTab).classList.remove('hidden');
            });
        });

        document.querySelector('.tab-button[data-tab="survey-form"]').click();
    </script>
</body>
</html>