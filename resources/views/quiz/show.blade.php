<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>AWSアイコンクイズ</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body>
    <div class="container">
        <h1>このAWSアイコンなに？</h1>

        <div>
            <img src="{{ asset('storage/' . $correct->icon_path) }}" alt="クイズ画像" width="180">
        </div>

        <form action="{{ route('quiz.answer') }}" method="POST">
            @csrf

            <input type="hidden" name="correct_id" value="{{ $correct->id }}">

            <div>
                @foreach ($choices as $choice)
                <button type="submit" name="answer_id" value="{{ $choice->id }}">
                    {{ $choice->name }}
                </button>
                @endforeach
            </div>
        </form>

        <p>
            <a href="{{ route('home') }}">トップへ戻る</a>
        </p>
    </div>
</body>

</html>
