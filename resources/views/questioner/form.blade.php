<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Survey Kepuasan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
            color: #333;
        }

        header {
            background-color: #f8f8fe;
            color: white;
            padding: 1rem;
            text-align: center;
        }

        main {
            padding: 2rem;
            max-width: 800px;
            margin: auto;
            background: white;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h1, h3 {
            color: #1d17c0;
        }

        form div {
            margin-bottom: 1rem;
        }

        label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: bold;
        }

        input, select, button {
            width: 100%;
            padding: 0.5rem;
            font-size: 1rem;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            background-color: #1d17c0;
            color: white;
            cursor: pointer;
            border: none;
        }

        button:hover {
            background-color: #1d17c0;
        }

        .hidden {
            display: none;
        }

        .survey-options label {
            display: inline-block;
            margin-right: 1rem;
        }

        .survey-options input {
            margin-right: 0.5rem;
        }

        footer {
            text-align: center;
            margin-top: 2rem;
            font-size: 0.9rem;
            color: #666;
        }

        .survey-question {
            margin-bottom: 2rem;
        }

        .survey-buttons {
            margin-top: 1rem;
            display: flex;
            justify-content: space-between;
        }

        .back-home-button {
            background-color: #f8f8fe;
            color: #1d17c0;
            padding: 0.5rem 1rem;
            border: 1px solid #1d17c0;
            border-radius: 4px;
            cursor: pointer;
            text-align: center;
        }

        .back-home-button:hover {
            background-color: #1d17c0;
            color: white;
        }
    </style>
</head>
<body>
    <header>
        <h1>Survey Kepuasan</h1>
    </header>

    <main>
        <!-- Section Data Diri -->
        <section id="data-diri-section">
            <h3>Data Diri</h3>
            <form id="data-diri-form" action="{{ route('kunjungan.store') }}" method="POST">
                @csrf
                <div>
                    <label for="nama">Nama:</label>
                    <input type="text" name="nama" id="nama" required>
                </div>
                <div>
                    <label for="nrp">Nrp:</label>
                    <input type="text" name="nrp" id="nrp" required>
                </div>
                <div>
                    <label for="email">Email:</label>
                    <input type="email" name="email" id="email" required>
                </div>
                <div>
                    <label for="strata">Strata:</label>
                    <select name="strata_id" id="strata" required onchange="updatePendidikanOptions()">
                        <option value="">Pilih Strata</option>
                        <option value="perwira">PERWIRA</option>
                        <option value="bintara">BINTARA</option>
                        <option value="tamtama">TAMTAMA</option>
                    </select>
                </div>
                
                <div>
                    <label for="pendidikan">Pendidikan:</label>
                    <select name="pendidikan_id" id="pendidikan" required>
                        <!-- Opsi pendidikan akan diupdate melalui JavaScript -->
                    </select>
                </div>
                <script>
                    function updatePendidikanOptions() {
                        var strata = document.getElementById("strata").value;
                        var pendidikanSelect = document.getElementById("pendidikan");
                        
                        // Kosongkan opsi pendidikan yang ada
                        pendidikanSelect.innerHTML = "";
                        
                        // Menambahkan opsi default
                        var defaultOption = document.createElement("option");
                        defaultOption.text = "Pilih Pendidikan";
                        defaultOption.value = "";
                        pendidikanSelect.appendChild(defaultOption);
                
                        // Menambahkan opsi pendidikan berdasarkan strata yang dipilih
                        if (strata === "perwira") {
                            var options = ["DIK SPESPA", "DIK CAPA","DIK SARGOL","DIK LAPA","DIK S1 STTAL","DIK S2 STTAL","DIK SESKOAL"];
                        } else if (strata === "bintara") {
                            var options = ["DIK MABA", "DIK JURBA", "DIK LABA","DIK D3 STTAL","DIK CABA KILAT","DIK CABA REGULER"];
                        } else if (strata === "tamtama") {
                            var options = ["DIK MATA","DIK JURTA"];
                        } else {
                            var options = [];
                        }
                
                        // Menambahkan opsi pendidikan baru
                        options.forEach(function(pendidikan) {
                            var option = document.createElement("option");
                            option.text = pendidikan;
                            option.value = pendidikan;
                            pendidikanSelect.appendChild(option);
                        });
                    }
                </script>                
                <button type="submit" id="to-pertanyaan-button">Berikutnya</button>
            </form>        
            </section>

        <!-- Section Pertanyaan -->
        <section id="pertanyaan-section" class="hidden">
            <h3>Pertanyaan Survey</h3>
            <form action="{{ route('survey.store') }}" method="POST">
                @csrf
                <div id="survey-question-container"></div>
                <div class="survey-buttons">
                    <button type="button" id="prev-question-button" class="hidden">Kembali</button>
                    <button type="button" id="next-question-button">Berikutnya</button>
                    <button type="submit" id="submit-survey-button" class="hidden">Kirim Survey</button>
                </div>
            </form>
        </section>

        <!-- Section Terimakasih -->
        <section id="terimakasih-section" class="hidden">
            <h3>Terima Kasih!</h3>
            <p>Survey Anda telah berhasil dikirim. Terima kasih atas partisipasi Anda!</p>
            <!-- Back to Home Page Button -->
            <button class="back-home-button" id="back-to-home-button">Kembali ke Halaman Utama</button>
        </section>
    </main>

    <footer>
        &copy; Survey Kepuasan TNI Angkatan Laut. Semua Hak Dilindungi.
    </footer>

    <script>
        const dataDiriSection = document.getElementById('data-diri-section');
        const pertanyaanSection = document.getElementById('pertanyaan-section');
        const terimakasihSection = document.getElementById('terimakasih-section');
        const toPertanyaanButton = document.getElementById('to-pertanyaan-button');
        const surveyQuestionContainer = document.getElementById('survey-question-container');
        const nextQuestionButton = document.getElementById('next-question-button');
        const prevQuestionButton = document.getElementById('prev-question-button');
        const submitSurveyButton = document.getElementById('submit-survey-button');
        const backToHomeButton = document.getElementById('back-to-home-button');
        const surveyForm = document.querySelector('form[action="{{ route('survey.store') }}"]');
        
        let currentQuestionIndex = 0;
        const questions = @json($pertanyaan); // Array of 5 random questions passed from the controller
        const answers = {}; // Stores temporary answers
    
        // Record the answer when the user selects an option
        function recordAnswer(questionId, answerValue) {
            answers[questionId] = answerValue;
        }
    
        // Show next section (pertanyaan)
        toPertanyaanButton.addEventListener('click', () => {
            const dataDiriForm = document.getElementById('data-diri-form');
            if (dataDiriForm.checkValidity()) {
                dataDiriSection.classList.add('hidden');
                pertanyaanSection.classList.remove('hidden');
                showQuestion();
            } else {
                dataDiriForm.reportValidity();
            }
        });
    
        // Display a question
        function showQuestion() {
            const question = questions[currentQuestionIndex];
            const selectedAnswer = answers[question.id]; // Get the stored answer for the question
    
            surveyQuestionContainer.innerHTML = `
                <div class="survey-question">
                    <label>${question.pertanyaan}</label>
                    <div class="survey-options">
                        <label>
                            <input type="radio" name="jawaban[${question.id}]" value="1" ${selectedAnswer === 1 ? 'checked' : ''} onchange="recordAnswer(${question.id}, 1)">
                            Sangat Tidak Puas
                        </label>
                        <label>
                            <input type="radio" name="jawaban[${question.id}]" value="2" ${selectedAnswer === 2 ? 'checked' : ''} onchange="recordAnswer(${question.id}, 2)">
                            Tidak Puas
                        </label>
                        <label>
                            <input type="radio" name="jawaban[${question.id}]" value="3" ${selectedAnswer === 3 ? 'checked' : ''} onchange="recordAnswer(${question.id}, 3)">
                            Netral
                        </label>
                        <label>
                            <input type="radio" name="jawaban[${question.id}]" value="4" ${selectedAnswer === 4 ? 'checked' : ''} onchange="recordAnswer(${question.id}, 4)">
                            Puas
                        </label>
                        <label>
                            <input type="radio" name="jawaban[${question.id}]" value="5" ${selectedAnswer === 5 ? 'checked' : ''} onchange="recordAnswer(${question.id}, 5)">
                            Sangat Puas
                        </label>
                    </div>
                </div>
            `;
    
            // Visibility logic for buttons
            prevQuestionButton.classList.toggle('hidden', currentQuestionIndex === 0);
            nextQuestionButton.classList.toggle('hidden', currentQuestionIndex === questions.length - 1);
            submitSurveyButton.classList.toggle('hidden', currentQuestionIndex !== questions.length - 1);
        }
    
        // Move to the next question
        nextQuestionButton.addEventListener('click', () => {
            currentQuestionIndex++;
            if (currentQuestionIndex < questions.length) {
                showQuestion();
            }
        });
    
        // Move to the previous question
        prevQuestionButton.addEventListener('click', () => {
            if (currentQuestionIndex > 0) {
                currentQuestionIndex--;
                showQuestion();
            }
        });
    
        // Check if all questions are answered before submitting
        function allQuestionsAnswered() {
            return questions.every((question) => answers[question.id] !== undefined);
        }
    
        // When submitting, check if all answers are filled out
        surveyForm.addEventListener('submit', (e) => {
            e.preventDefault();
            if (!allQuestionsAnswered()) {
                alert("Tolong jawab semua pertanyaan sebelum mengirimkan survey!");
                return;
            }
            console.log("Jawaban yang direkam:", answers); // Debug log
            pertanyaanSection.classList.add('hidden');
            terimakasihSection.classList.remove('hidden');
        });
    
        // Redirect to the landing page when the "Kembali ke Halaman Utama" button is clicked
        backToHomeButton.addEventListener('click', () => {
            window.location.href = '/'; // Redirect to the landing page (home page)
        });
    </script>    
</body>
</html>