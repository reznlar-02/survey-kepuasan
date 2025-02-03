<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CAT (Computerized Adaptive Test)</title>
    <link rel="stylesheet" href="{{ url('assets/css/style.min.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">MyApp</a>
                <div class="collapse navbar-collapse">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                            <a href="#" class="nav-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <main class="container mt-5">
        <h1>Computerized Adaptive Test (CAT)</h1>
        <p>Please answer the following questions carefully.</p>

        <form action="{{ route('submit.cat') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="question1">Question 1: What is the capital of France?</label>
                <input type="text" id="question1" name="question1" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="question2">Question 2: 5 + 7 equals?</label>
                <input type="number" id="question2" name="question2" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="question3">Question 3: Who wrote "Hamlet"?</label>
                <input type="text" id="question3" name="question3" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </main>

    <footer class="mt-5">
        <div class="container">
            <p class="text-center">&copy; 2024 MyApp. All rights reserved.</p>
        </div>
    </footer>

</body>
</html>