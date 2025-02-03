<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Survey Kepuasan</title>
</head>
<body>
    <h1>Survey Kepuasan</h1>

    @if (session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <form action="{{ route('survey.store') }}" method="POST">
        @csrf
        @foreach ($questions as $question)
            <div>
                <label for="jawaban{{ $question->id }}">{{ $question->pertanyaan }}</label>
                <input type="text" name="jawaban[{{ $question->id }}]" id="jawaban{{ $question->id }}" required>
            </div>
        @endforeach
        <button type="submit">Submit</button>
    </form>
</body>
</html>