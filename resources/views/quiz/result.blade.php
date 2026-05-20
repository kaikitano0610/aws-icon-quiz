<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>クイズ結果</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body>
    <div class="container">
        <h1>結果</h1>

        <div>
            <img src="{{ asset('storage/' . $correct->icon_path) }}" alt="{{ $correct->name }}" width="180">
        </div>

        @if ($isCorrect)
        <h2>正解！</h2>
        @else
        <h2>不正解...</h2>
        <p>あなたの回答：{{ $answer->name }}</p>
        @endif

        <p>正解：{{ $correct->name }}</p>

        @if ($correct->category)
        <p>カテゴリ：{{ $correct->category }}</p>
        @endif

        @if ($correct->description)
        <p>説明：{{ $correct->description }}</p>
        @endif

        <p>
            <a href="{{ route('quiz.show') }}">次の問題へ</a>
        </p>

        <p>
            <a href="{{ route('aws-services.index') }}">一覧へ戻る</a>
        </p>
    </div>
</body>

</html>
